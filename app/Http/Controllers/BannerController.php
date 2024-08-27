<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerPosition;
use DataTables;
use Validator, Auth;

class BannerController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data = Banner::with('position')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('Banners.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                                <a href="' . route('Banners.Delete', [base64_encode($row->id)]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                })
                ->addColumn('banner_image', function ($row) {
                    return '<img src="' . asset('uploads/banners/' . $row->banner_image) . '" alt="Banners" width="50">';
                })
                ->rawColumns(['action', 'banner_image', 'status'])
                ->make(true);
        }

        return view('admin.Banners.index');
    }

    public function add()
    {
        $getcont = BannerPosition::orderBy('id', 'desc')->get();
        return view('admin.Banners.add', compact('getcont'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'url' => 'nullable|url',
        ]);

        $bannerdata = new Banner;
        $bannerdata->title = $req->title;
        $bannerdata->sub_title = $req->sub_title;
        $bannerdata->url = $req->url;
        $bannerdata->description = $req->description;
        $bannerdata->position_id = $req->name;

        if ($req->hasFile('banner_image')) {
            $file = $req->file('banner_image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banners/'), $fileName);
            $bannerdata->banner_image = $fileName;
        }

        $bannerdata->status = $req->status;

        if ($bannerdata->save()) {
            return redirect()->route('data.index')->with('success', 'Banner successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Banner add. Please try again');
        }
    }

    public function edit($id)
    {
        $getbanner = Banner::findOrFail(base64_decode($id));
        $getcont = BannerPosition::orderBy('id', 'desc')->get();

        return view('admin.Banners.edit', compact('getbanner', 'getcont'));
    }

    public function update($id, Request $req)
    {
        $req->validate([
            'title' => 'required',
            'status' => 'required',
            'url' => 'nullable|url',
        ]);
        
        $bannerdata = Banner::find($id);
        $bannerdata->title = $req->title;
        $bannerdata->sub_title = $req->sub_title;
        $bannerdata->url = $req->url;
        $bannerdata->description = $req->description;
        $bannerdata->position_id = $req->position_id;
        
        if ($req->hasFile('banner_image')) {
            $file = $req->file('banner_image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banners/'), $fileName);
            $bannerdata->banner_image = $fileName;
        }

        $bannerdata->status = $req->status;

        if ($bannerdata->save()) {
            return redirect()->route('data.index')->with('success', 'Banner successfully updated');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Banner update. Please try again');
        }
    }

    public function delete($id)
    {
        Banner::find(base64_decode($id))->delete();
        return redirect()->route('data.index')->with('success', 'Banner successfully deleted');
    }
}