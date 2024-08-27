<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use DataTables;

class SettingController extends Controller
{
    public function index()
    {
        $getsetting = Setting::orderBy('id', 'desc')->first();
        return view('admin.Setting.index', compact('getsetting'));
    }
    public function edit($id)
    {
        $getsetting = Setting::findOrFail($id); // Fetch the setting by its ID
        return view('admin.Setting.edit', compact('getsetting'));
    }

    public function update($id, Request $request)
    {
        //echo "<pre>";print_r($request->all());die;
        $request->validate([
            'site_name' => 'required',
            'site_email' => 'required',
            'site_contact' => 'required',
            'site_address' => 'required',


        ]);
        $settimgdata = Setting::find($id);
        $settimgdata->site_name = $request->site_name;
        $settimgdata->site_email = $request->site_email;
        $settimgdata->site_contact = $request->site_contact;
        $settimgdata->site_address = $request->site_address;
        $settimgdata->header_code = $request->header_code;
        $settimgdata->footer_code = $request->footer_code;
        $settimgdata->facebook_url = $request->facebook_url;
        $settimgdata->insta_url = $request->insta_url;
        $settimgdata->twitter_url = $request->twitter_url;
        $settimgdata->youtube_url = $request->youtub_url;
        $settimgdata->linkdin_url = $request->linkdin_url;
        if (request()->hasFile('sitelogo')) {
            $file = request()->file('sitelogo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/banners/', $fileName);
            $settimgdata->site_logo = $fileName;
        }
        if (request()->hasFile('favicon')) {
            $file = request()->file('favicon');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/banners/', $fileName);
            $settimgdata->site_fav_icon = $fileName;
        }
        if ($settimgdata->save()) {
            return redirect()->route('Setting.index')->with('success', 'setting successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in setting add. Please try again');
        }
    }
}
