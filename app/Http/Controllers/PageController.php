<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use DataTables;
use Validator, Auth;

class PageController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            $data = Page::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('Page.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="' . route('Page.Delete', [base64_encode($row->id)]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                })

                ->addColumn('image', function ($row) {
                    return '<img src="' . asset('uploads/banners/' . $row->image) . '" alt="Category" width="50">';
                })

                ->rawColumns(['action', 'image', 'status'])
                ->make(true);
        }
        return view('admin.Page.index');
    }

    public function add()
    {
        return view('admin.Page.add');
    }

    public function store(Request $req)
    {
        // echo"<pre>";print_r($req->all());die;

        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        $subcategorydata = new Page;
        $subcategorydata->title = $req->title;
        $subcategorydata->description = $req->description;

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/banners/', $fileName);
            $subcategorydata->image = $fileName;
        }
        $subcategorydata->status = $req->status;
        if ($subcategorydata->save()) {
            return redirect()->route('Page.index')->with('success', 'Category successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
        }
    }
    public function edit($id)
    {
        $getbanner = Page::findOrFail(base64_decode($id));
        return view('admin.Page.edit', compact('getbanner'));
    }


    public function update($id, Request $req)
    {
        // echo"<pre>";print_r($req->all());die;
        $subcategorydata = Page::find($id);
        $subcategorydata->title = $req->title;
        $subcategorydata->description = $req->description;

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/banners/', $fileName);
            $subcategorydata->image = $fileName;
        }
        $subcategorydata->status = $req->status;
        if ($subcategorydata->save()) {
            return redirect()->route('Page.index')->with('success', 'Category successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
        }
    }


    function delete($id)
    {
        Page::find(base64_decode($id))->delete();
        return redirect()->route('Page.index')->with('success', 'Banner successfully updated');
    }
}
