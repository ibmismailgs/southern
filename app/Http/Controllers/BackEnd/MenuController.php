<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\BackEnd\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = DB::table('menus')
                    ->whereNull('deleted_at')
                    ->orderByDesc('id')
                    ->get();

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

                        $show = '<li><a class="dropdown-item" href="' . route('menu.show', $data->id) . ' " ><i class="ik ik-eye f-16 text-blue"></i> Details</a></li>';

                        $edit = '<li><a class="dropdown-item" id="edit" href="' . route('menu.edit', $data->id) . ' " title="Edit"><i class="ik ik-edit f-16 text-green"></i> Edit</a></li>';

                        $delete = '<li><a class="dropdown-item" id="delete" href="' . route('menu.destroy', $data->id) . ' " title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i> Delete</a></li>';


                        if(Auth::user()->can('manage_user')){
                            $button =  $show . $edit . $delete;
                        }

                        return '<div class="btn-group open">
                            <a class="badge badge-primary dropdown-toggle" href="#" role="button"  data-toggle="dropdown">Actions<i class="ik ik-chevron-down mr-0 align-middle"></i></a>
                            <ul class="dropdown-menu" role="menu" style="width:auto; min-width:auto;">'.$button.'
                        </ul>
                        </div>';
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

    public function create()
    {
        return view('backend.menu.create');
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
        $messages = array(
            'title.required'  => 'Enter menu title',
        );

        $this->validate($request, array(
            'title' => 'required|string|unique:menus,title,NULL,id,deleted_at,NULL',
        ), $messages);

        try {
            $data = new Menu();
            $data->title = $request->title;
            $data->status = $request->status;
            $data->created_by = Auth::user()->id;
            $data->save();

            return redirect()->route('menu.index')
                ->with('success', 'Menu created successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
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
    public function show($id)
    {
        $data = Menu::findOrFail($id);
        return view('backend.menu.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Menu::findOrFail($id);
        return view('backend.menu.edit', compact('data'));
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
        $messages = array(
            'title.required'  => 'Enter menu title',
        );

        $this->validate($request, array(
            'title' => 'required|string|unique:menus,title,' . $id . ',id,deleted_at,NULL',
        ), $messages);

        try {
            $data = Menu::findOrFail($id);
            $data->title = $request->title;
            $data->status = $request->status;
            $data->updated_by = Auth::user()->id;
            $data->update();

            return redirect()->route('menu.index')
                ->with('success', 'Menu updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
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
