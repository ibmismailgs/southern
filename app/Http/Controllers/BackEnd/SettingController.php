<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BackEnd\Setting;

class SettingController extends Controller
{
    public function Settings(){
        try {
            $data = Setting::first();
            return view('backend.settings.setting', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function SettingStore(Request $request)
    {
        try {
            if (!$request->id) {
                $request->validate([
                    'name' => 'required',
                    'website' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                    'favicon' => 'required',
                    'logo' => 'required',
                ]);

                $data = new Setting();
            } else {
                $data = Setting::findOrFail($request->id);
            }

            if ($request->file('logo')) {
                $file = $request->file('logo');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/img/settings/'), $filename);
                $data->logo = $filename;
            }

            if ($request->file('favicon')) {
                $file = $request->file('favicon');
                $filenamefavicon = time() . $file->getClientOriginalName();
                $file->move(public_path('/img/settings/'),  $filenamefavicon);
                $data->favicon =  $filenamefavicon;
            }

            $data->name = $request->name;
            $data->website = $request->website;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->map = $request->map;
            $data->description = $request->description;

            if (!$request->id) {
                $data->save();
                return redirect()->route('settings')->with('success', ' Settings created successfully');
            } else {
                $data->update();
                return redirect()->route('settings')->with('success', 'Settings updated successfully');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
