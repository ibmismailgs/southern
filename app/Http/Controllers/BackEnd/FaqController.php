<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BackEnd\Faq;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class FaqController extends Controller
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
                    $data = DB::table('faqs')
                        ->whereNull('deleted_at')
                        ->orderByDesc('id');

                return Datatables::of($data)

                    ->addColumn('title', function ($data) {
                        $result = isset($data->title) ? strip_tags($data->title) : '--' ;
                        return Str::limit( $result, 60) ;
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

                        $details = '<li><a class="dropdown-item" href="' . route('faq.show', $data->id) . ' " ><i class="ik ik-eye f-16 text-blue"></i> Details</a></li>';

                        $edit = '<li><a class="dropdown-item" href="' . route('faq.edit', $data->id) . ' "><i class="ik ik-edit f-16 text-green"></i> Edit</a></li>';

                        $delete = '<li><a class="dropdown-item" id="delete" href="' . route('faq.destroy', $data->id) . ' " title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i> Delete</a></li>';

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
                    ->rawColumns(['title','description','status', 'action'])
                    ->toJson();
            }
            return view('backend.faq.index');
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
        return view('backend.faq.create');
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
            'title.required'   => 'Enter faq title',
            'description.required'   => 'Write faq description',
        );

        $this->validate($request, array(
            'title' => 'required|string|unique:faqs,title,NULL,id,deleted_at,NULL',
            'description' => 'required|string|',
        ), $messages);

        try {
            $data = new Faq();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->status = 1;
            $data->created_by = Auth::user()->id;
            $data->save();

            return redirect()->route('faq.index')
                ->with('success', 'Faq created successfully');
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
        $data = Faq::findOrFail($id);
        return view('backend.faq.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        return view('backend.faq.edit', compact('data'));
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
            'title.required'   => 'Enter faq title',
            'description.required'   => 'Write faq description',
        );

        $this->validate($request, array(
            'title' => 'required|string|unique:faqs,title,' . $id . ',id,deleted_at,NULL',
            'description' => 'required|string|',
        ), $messages);

        try {
            $data = Faq::findOrFail($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->created_by = Auth::user()->id;
            $data->update();

            return redirect()->route('faq.index')
                ->with('success', 'Faq updated successfully');
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
            $data = Faq::findOrFail($id);
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Faq deleted successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Faq delete failed',
            ]);
        }
    }
    public function StatusChange(Request $request)
    {
        $data = Faq::findOrFail($request->id);
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
