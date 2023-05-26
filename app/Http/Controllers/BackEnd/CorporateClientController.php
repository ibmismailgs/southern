<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BackEnd\CorporateClient;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CorporateClientController extends Controller
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
                    $data = DB::table('corporate_clients')
                        ->whereNull('deleted_at')
                        ->get();

                return Datatables::of($data)

                    ->addColumn('logo', function ($data) {

                        $logo = '<img id="logo" title="Logo" style="border:1px solid grey;height:40px; width:100px;" src="'.asset('img/clientlogo').'/'.$data->logo.'" alt="Logo">&nbsp;';

                        return $logo;
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

                        $details = '<li><a class="dropdown-item" href="' . route('corporate-client.show', $data->id) . ' " ><i class="ik ik-eye f-16 text-blue"></i> Details</a></li>';

                        $edit = '<li><a class="dropdown-item" href="' . route('corporate-client.edit', $data->id) . ' "><i class="ik ik-edit f-16 text-green"></i> Edit</a></li>';

                        $delete = '<li><a class="dropdown-item" id="delete" href="' . route('corporate-client.destroy', $data->id) . ' " title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i> Delete</a></li>';

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
                    ->rawColumns(['logo','status', 'action'])
                    ->toJson();
            }
            return view('backend.corporateclient.index');
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
        return view('backend.corporateclient.create');
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
            'client_name.required'   => 'Enter client name',
            'phone.required'    => 'Enter phone number',
            'email.required'    => 'Enter email address',
            'address.required'   => 'Write client address',
            'website.required'   => 'Enter website url',
            'logo.required'   => 'Enter logo',
        );

        $this->validate($request, array(
            'client_name' => 'required|string|unique:corporate_clients,client_name,NULL,id,deleted_at,NULL',
            'phone' => 'required||min:6|max:17|regex:/(01)[0-9]{9}/|unique:corporate_clients,phone,NULL,id,deleted_at,NULL',
            'website' => 'required|string|unique:corporate_clients,website,NULL,id,deleted_at,NULL',
            'email' => 'required|string|unique:corporate_clients,email,NULL,id,deleted_at,NULL',
            'address' => 'required|string|',
            'logo.*' => 'required|max:1024|mimes:jpeg,png,jpg',
        ), $messages);

        try {
            $data = new CorporateClient();

            $logo = $request->file('logo');
            if($request->hasfile('logo')) {
                $filename = time() . $logo->getClientOriginalName();
                $logo->move(public_path('/img/clientlogo/'), $filename);
                $data->logo = $filename;
            }else{
                return redirect()->back()->with('error', 'Choose logo');
            }

            $data->client_name = $request->client_name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->website = $request->website;
            $data->address = $request->address;
            $data->status = 1;
            $data->description = $request->description;
            $data->created_by = Auth::user()->id;
            $data->save();

            return redirect()->route('corporate-client.index')
                ->with('success', 'Client created successfully');
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
        $data = CorporateClient::findOrFail($id);
        return view('backend.corporateclient.show', compact('data'));
    }

    public function edit($id)
    {
        $data = CorporateClient::findOrFail($id);
        return view('backend.corporateclient.edit', compact('data'));
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
            'client_name.required'   => 'Enter client name',
            'phone.required'    => 'Enter phone number',
            'email.required'    => 'Enter email address',
            'address.required'   => 'Write client address',
            'website.required'   => 'Enter website url',
            'logo.required'   => 'Enter logo',
        );

        $this->validate($request, array(
            'phone' => 'required||min:11|max:11|regex:/(01)[0-9]{9}/|unique:corporate_clients,phone,' . $id . ',id,deleted_at,NULL',
            'client_name' => 'required|string|unique:corporate_clients,client_name,' . $id . ',id,deleted_at,NULL',
            'website' => 'required|string|unique:corporate_clients,website,' . $id . ',id,deleted_at,NULL',
            'email' => 'required|string|unique:corporate_clients,email,' . $id . ',id,deleted_at,NULL',
            'address' => 'required|string|',
            'logo.*' => 'required|max:1024|mimes:jpeg,png,jpg',
        ), $messages);

        try {
            $data = CorporateClient::findOrFail($id);

            $logo = $request->file('logo');
            if($request->hasfile('logo')) {
                $filename = time() . $logo->getClientOriginalName();
                $logo->move(public_path('/img/clientlogo/'), $filename);
                $data->logo = $filename;
            }else{
                $data->logo = $request->current_logo;
            }

            $data->client_name = $request->client_name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->website = $request->website;
            $data->address = $request->address;
            $data->description = $request->description;
            $data->created_by = Auth::user()->id;
            $data->save();

            return redirect()->route('corporate-client.index')
                ->with('success', 'Client updated successfully');
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
            $data = CorporateClient::findOrFail($id);
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data deleted successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Data delete failed',
            ]);
        }
    }
    public function StatusChange(Request $request)
    {
        $data = CorporateClient::findOrFail($request->id);
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
