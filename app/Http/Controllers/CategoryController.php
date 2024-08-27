<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
use Validator, Auth;
class CategoryController extends Controller
{
  public function index()
  {
    if (\request()->ajax()) {
      $data = Category::latest()->get();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '<a href="' . route('Category.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                      <a href="'. route('Category.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
          return $actionBtn;
        })
        ->addColumn('status', function ($row) {
          return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
      })
      
        ->addColumn('categories_image', function ($row) {
          return '<img src="' . asset('uploads/Category/' . $row->categories_image) . '" alt="Category" width="50">';
        })

        ->rawColumns(['action', 'categories_image','status'])
        ->make(true);
    }
    return view('admin.Category.index');
  }


  public function add()
  {
    return view('admin.Category.add');
  }


  public function store(Request $req)
  {
    //echo"<pre>";print_r($req->all());die;

    $req->validate([
      'name' => 'required',
      'display_menu' => 'required',
      'display_home' => 'required',
      'category_image' => 'required',
      'status' => 'required',
    ]);

    $categorydata = new Category;
    $categorydata->name = $req->name;
    $categorydata->display_menu = $req->display_menu;
    $categorydata->display_home = $req->display_home;
     if (request()->hasFile('category_image')) {
      $file = request()->file('category_image');
      $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
      $file->move('./uploads/Category/', $fileName);
      $categorydata->categories_image = $fileName;
    }
    $categorydata->status = $req->status;
    if ($categorydata->save()) {
      return redirect()->route('Category.index')->with('success', 'Category successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }


  public function edit($id)
  {
    $getCategory = Category::findOrFail(base64_decode($id));
    return view('admin.Category.edit', compact('getCategory'));
  }

  public function update($id,Request $req){

    echo "<pre>";print_r($req->all());
  $req->validate([
    'name' => 'required',
    'display_menu' => 'required',
    'display_home' => 'required',
    'category_image' => 'required',
    'status' => 'required',
  ]);
  $categorydata =Category::find($id);
  $categorydata->name = $req->name;
  $categorydata->display_menu = $req->display_menu;
  $categorydata->display_home = $req->display_home;
   if (request()->hasFile('category_image')) {
    $file = request()->file('category_image');
    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
    $file->move('./uploads/Category/', $fileName);
    $categorydata->categories_image = $fileName;
  }
  $categorydata->status = $req->status;
  if ($categorydata->save()) {
    return redirect()->route('Category.index')->with('success', 'Category successfully added');
  } else {
    return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
  }
}
  
  function delete($id)
  {
    Category::find(base64_decode($id))->delete();
    return redirect()->route('Category.index')->with('success', 'Category successfully updated');
  }

}

