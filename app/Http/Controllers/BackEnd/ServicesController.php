<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BackEnd\Services;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        try {
            if ($request->ajax()) {
                    $data = DB::table('services')
                        ->whereNull('deleted_at')
                        ->orderByDesc('id');

                return Datatables::of($data)

                    ->addColumn('icon', function ($data) {

                        $icon = '<img id="icon" title="Icon" style="border:1px solid grey;height:40px; width:100px;" src="'.asset('img/services').'/'.$data->icon.'" alt="Icon">&nbsp;';

                        return $icon;
                    })

                    ->addColumn('description', function ($data) {
                        $result = isset($data->description) ? strip_tags($data->description) : '--' ;
                        return Str::limit( $result, 60) ;
                    })

                    ->addColumn('status', function ($data) {
                            $button = '<label class="switch">';
                            $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $data->id . '" getId="' . $data->id . '" name="status"';

                            if ($data->status == 1) {
                                $button .= "checked";
                            }
                            $button .= ' ><span class="slider round"></span>';
                            $button .= '</label>';
                            return $button;
                    })

                    ->addColumn('action', function ($data) {

                        $button = '';

                        $details = '<li><a class="dropdown-item" href="' . route('our-services.show', $data->id) . ' " ><i class="ik ik-eye f-16 text-blue"></i> Details</a></li>';

                        $edit = '<li><a class="dropdown-item" href="' . route('our-services.edit', $data->id) . ' "><i class="ik ik-edit f-16 text-green"></i> Edit</a></li>';

                        $delete = '<li><a class="dropdown-item" id="delete" href="' . route('our-services.destroy', $data->id) . ' " title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i> Delete</a></li>';

                        if(Auth::user()->can('manage_user')){
                            $button =  $details. $edit. $delete;
                        }

                        return '<div class="btn-group open">
                        <a class="badge badge-primary dropdown-toggle" href="#" role="button"  data-toggle="dropdown">Actions<i class="ik ik-chevron-down mr-0 align-middle"></i></a>
                        <ul class="dropdown-menu" role="menu" style="width:auto; min-width:auto;">'.$button.'
                        </ul>
                    </div>';
                })
                    ->addIndexColumn()
                    ->rawColumns(['description','icon','status', 'action'])
                    ->toJson();
            }
            return view('backend.services.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'title.required'   => 'Enter service title',
            'icon.required'    => 'Enter service icon',
            'description.required'   => 'Write description here',
        );

        $this->validate($request, array(
            'title' => 'required|string|unique:services,title,NULL,id,deleted_at,NULL',
            'description' => 'required|string|',
            'icon.*' => 'required|max:1024|mimes:jpeg,png,jpg',
        ), $messages);

        try {
            $data = new Services();

            $icon = $request->file('icon');
            if($request->hasfile('icon')) {
                $filename = time() . $icon->getClientOriginalName();
                $icon->move(public_path('/img/services/'), $filename);
                $data->icon = $filename;
            }else{
                return redirect()->back()->with('error', 'Choose icon');
            }

            $data->title = $request->title;
            $data->status = 1;
            $data->description = $request->description;
            $data->created_by = Auth::user()->id;
            $data->save();

            return redirect()->route('our-services.index')
                ->with('success', 'Service created successfully');
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
        $data = Services::findOrFail($id);
        return view('backend.services.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Services::findOrFail($id);
        return view('backend.services.edit', compact('data'));
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
            'title.required'   => 'Enter service title',
            'icon.required'    => 'Enter service icon',
            'description.required'   => 'Write description here',
        );

        $this->validate($request, array(
            'title' => 'required|string|unique:services,title,' . $id . ',id,deleted_at,NULL',
            'description' => 'required|string|',
            'icon.*' => 'required|max:1024|mimes:jpeg,png,jpg',
        ), $messages);


        try {
            $data = Services::findOrFail($id);

            $icon = $request->file('icon');
            if($request->hasfile('icon')) {
                $filename = time() . $icon->getClientOriginalName();
                $icon->move(public_path('/img/services/'), $filename);
                $data->icon = $filename;
            }else{
                $data->icon = $request->current_icon;
            }

            $data->title = $request->title;
            $data->description = $request->description;
            $data->created_by = Auth::user()->id;
            $data->save();

            return redirect()->route('our-services.index')
                ->with('success', 'Service updated successfully');
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
            $data = Services::findOrFail($id);
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Service deleted successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Service delete failed',
            ]);
        }
    }
    public function StatusChange(Request $request)
    {
        $data = Services::findOrFail($request->id);
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
