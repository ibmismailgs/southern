<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\BackEnd\Menu;
use Illuminate\Http\Request;
use App\Models\Backend\SubMenu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SubMenuController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {

                $data = DB::table('sub_menus')
                    ->join('menus', 'sub_menus.menu_id', '=', 'menus.id')
                    ->select('sub_menus.*', 'menus.title')
                    ->whereNull('sub_menus.deleted_at')
                    ->orderByDesc('sub_menus.id');

                return Datatables::of($data)

                ->addColumn('status', function ($data) {
                    if (Auth::user()->can('manage_user')) {
                        $button = '<label class="switch">';
                        $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $data->id . '" getId="' . $data->id . '" name="status"';

                        if ($data->status == 1) {
                            $button .= "checked";
                        }
                        $button .= ' ><span class="slider round"></span>';
                        $button .= '</label>';
                        return $button;
                    }else{
                        if($data->status == 1){
                            return '<span class="badge badge-success" title="Active">Active</span>';
                        }elseif($data->status == 0){
                            return '<span class="badge badge-danger" title="Inactive">Inactive</span>';
                        }
                     }

                })

                    ->addColumn('action', function ($data) {

                        $button = '';

                        $edit = '<a id="edit" href="' . route('sub-menu.edit', $data->id) . ' " class="btn btn-sm btn-primary edit  mr-5" title="Edit" data-toggle="modal" data-target="#editSubMenu"><i class="fa fa-edit"></i></a>';

                        $delete = '<a id="delete" href="' . route('sub-menu.destroy', $data->id) . ' " title="Delete" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash-alt"></i></a>';


                        if(Auth::user()->can('manage_user')){
                            $button =  $edit . $delete;
                        }

                        return $button;
                    })

                    ->addIndexColumn()
                    ->rawColumns(['status','action'])
                    ->toJson();
            }

            $menus = Menu::where('status', 1)->get();
            return view('backend.submenu.index', compact('menus'));

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->ajax()) {

            $data = Validator::make($request->all(), [
                'sub_menu_title' => 'required|string|unique:sub_menus,sub_menu_title,NULL,id,deleted_at,NULL',
            ]);

            if ($data->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $data->errors()->all(),
                ]);
            }

            try {
                    $data = new SubMenu();
                    $data->sub_menu_title = $request->sub_menu_title;
                    $data->menu_id = $request->menu_id;
                    $data->status = $request->status;
                    $data->created_by = Auth::user()->id;
                    $data->save();

                    return response()->json([
                        'success' => true,
                        'message' => 'Sub-Menu created successfully',
                    ]);

            } catch (\Exception $exception) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed To Create Sub-Menu',
                ]);

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        $data = SubMenu::with('menus')->findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Validator::make($request->all(), [
            'sub_menu_title' => 'required|string|unique:sub_menus,sub_menu_title,' . $id . ',id,deleted_at,NULL',
        ]);

        if ($data->fails()) {
            return response()->json([
                'success' => false,
                'message' => $data->errors()->all(),
            ]);
        }

            try {
                $data = SubMenu::findOrFail($id);
                $data->sub_menu_title = $request->sub_menu_title;
                $data->menu_id = $request->menu_id;
                $data->status = $request->status;
                $data->created_by = Auth::user()->id;
                $data->update();

                return response()->json([
                    'success' => true,
                    'message' => 'Sub-Menu updated successfully',
                ]);

            } catch (\Exception $exception) {
                return response()->json([
                    'success' => false,
                    'message' => $exception->getMessage(),
                ]);
            }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = SubMenu::findOrFail($id);
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Sub-Menu deleted successfully',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sub-Menu deleted failed',
            ]);
        }
    }
    public function StatusChange(Request $request)
    {
        $data = SubMenu::findOrFail($request->id);
        $data->status = $data->status == 1 ? 0 : 1;
        $data->update();

        if ($data->status == 1) {
            return response()->json([
                'success' => true,
                'message' => 'Status activated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Status inactivated successfully',
            ]);
        }
    }
}
