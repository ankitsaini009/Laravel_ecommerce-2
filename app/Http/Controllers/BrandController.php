<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DataTables;
use Validator, Auth;

class BrandController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data = Brand::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('Brand.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="' . route('Brand.Delete', [base64_encode($row->id)]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                })

                ->addColumn('brand_image', function ($row) {
                    return '<img src="' . asset('uploads/Category/' . $row->brand_image) . '" alt="Category" width="50">';
                })

                ->rawColumns(['action', 'brand_image', 'status'])
                ->make(true);
        }
        return view('admin.Brand.index');
    }

    public function add()
    {
        return view('admin.Brand.add');
    }

    public function store(Request $req)
    {
      //  echo"<pre>";print_r($req->all());die;

        $req->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
            'status' => 'required',
        ]);
        $branddata = new Brand;
        $branddata->brands_name = $req->brand_name;
        if (request()->hasFile('brand_image')) {
            $file = request()->file('brand_image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/Category/', $fileName);
            $branddata->brand_image = $fileName;
        }
        $branddata->status = $req->status;
        if ($branddata->save()) {
            return redirect()->route('Brand.index')->with('success', 'Category successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
        }
    }

    public function edit($id)
  {
    $getbanner = Brand::findOrFail(base64_decode($id));
    return view('admin.Brand.edit', compact('getbanner'));
  }

  public function update($id,Request $req)
    {
      //  echo"<pre>";print_r($req->all());die;

        $req->validate([
            'brands_name' => 'required',
            'brand_image' => 'required',
            'status' => 'required',
        ]);
        $branddata =Brand::find($id);
        $branddata->brands_name = $req->brands_name;
        if (request()->hasFile('brand_image')) {
            $file = request()->file('brand_image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/Category/', $fileName);
            $branddata->brand_image = $fileName;
        }
        $branddata->status = $req->status;
        if ($branddata->save()) {
            return redirect()->route('Brand.index')->with('success', 'Category successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
        }
    }
    function delete($id)
  {
    Brand::find(base64_decode($id))->delete();
    return redirect()->route('Brand.index')->with('success', 'Banner successfully updated');
  }

}
