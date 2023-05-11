<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\BackEnd\Menu;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = DB::table('menus')
                    ->whereNull('deleted_at')
                    ->orderByDesc('id');

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

                        $edit = '<a id="edit" href="' . route('menu.edit', $data->id) . ' " class="btn btn-sm btn-primary edit  mr-5" title="Edit" data-toggle="modal" data-target="#editMenu"><i class="fa fa-edit"></i></a>';

                        $delete = '<a id="delete" href="' . route('menu.destroy', $data->id) . ' " title="Delete" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash-alt"></i></a>';


                        if(Auth::user()->can('manage_user')){
                            $button =  $edit . $delete;
                        }

                        return $button;
                    })

                    ->addIndexColumn()
                    ->rawColumns(['status','action'])
                    ->toJson();
            }
            return view('backend.menu.index');
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
                'title' => 'required|string|unique:menus,title,NULL,id,deleted_at,NULL',
            ]);

            if ($data->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $data->errors()->all(),
                ]);
            }

            try {
                $data = new Menu();
                $data->title = $request->title;
                $data->status = $request->status;
                $data->created_by = Auth::user()->id;
                $data->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Menu created successfully',
                ]);

            } catch (\Exception $exception) {
                return response()->json([
                    'success' => true,
                    'message' => $exception->getMessage(),
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
        $data = Menu::findOrFail($id);
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
            'title' => 'required|string|unique:menus,title,' . $id . ',id,deleted_at,NULL',
        ]);

        if ($data->fails()) {
            return response()->json([
                'success' => false,
                'message' => $data->errors()->all(),
            ]);
        }

        try {
            $data = Menu::findOrFail($id);
            $data->title = $request->title;
            $data->status = $request->status;
            $data->created_by = Auth::user()->id;
            $data->update();

            return response()->json([
                'success' => true,
                'message' => 'Menu updated successfully',
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
            $data = Menu::findOrFail($id);
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Menu deleted successfully',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Menu deleted failed',
            ]);
        }
    }
    public function StatusChange(Request $request)
    {
        $data = Menu::findOrFail($request->id);
        $data->status = $data->status == 1 ? 0 : 1;
        $data->update();

        if ($data->status == 1) {
            return response()->json([
                'success' => true,
                'message' => 'Menu status activated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Menu status inactivated successfully',
            ]);
        }
    }
}

