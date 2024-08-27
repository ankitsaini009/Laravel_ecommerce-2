<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\subcategories;
use App\models\category;
use DataTables;
class SubcategoryController extends Controller
{
    public function index()
    {
       if (\request()->ajax()) {
        $data = subcategories::with('category')->latest()->get();
         return DataTables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function ($row) {
            $actionBtn = '<a href="' . route('Subcategory.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="'. route('Subcategory.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
            return $actionBtn;
          })
          ->addColumn('status', function ($row) {
            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
        })

        
          ->addColumn('subcategories_image', function ($row) {
            return '<img src="' . asset('uploads/subcategory/' . $row->subcategories_image) . '" alt="Category" width="50">';
          })
  
          ->rawColumns(['action', 'subcategories_image','status'])
          ->make(true);
      }
      return view('admin.Subcategory.index');
    }

    public function add(){
      $getcategory = category:: orderBy('id','desc')->get();
      return view('admin.Subcategory.add',compact('getcategory'));
    }

    
    public function store(Request $req)
    {
     // echo"<pre>";print_r($req->all());die;
  
      $req->validate([
        'name' => 'required',
        'category' => 'required',
        'subcategory_image' => 'required',
        'status' => 'required',
      ]);
  
      $subcategorydata = new subcategories;
      $subcategorydata->subcategories_name = $req->name;
      $subcategorydata->category_id = $req->category;
        if (request()->hasFile('subcategory_image')) {
        $file = request()->file('subcategory_image');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/subcategory/', $fileName);
        $subcategorydata->subcategories_image = $fileName;
      }
      $subcategorydata->status = $req->status;
      if ($subcategorydata->save()) {
        return redirect()->route('Subcategory.index')->with('success', 'Category successfully added');
      } else {
        return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
      }
    }
    public function edit($id)
    {
      $getcategory = subcategories::findOrFail(base64_decode($id));
      $category = category::orderBy('id','desc')->get();
      //echo "<pre>";print_r($category->all());die;
      return view('admin.Subcategory.edit', compact('getcategory','category'));
    }
  
    public function update($id,Request $req)
    {
    //echo"<pre>";print_r($req->all());die;
     //echo "<pre>";print_r($req->all());

      $req->validate([
        'name' => 'required',
        'category_id' => 'required',
        'subcategory_name' => 'required',
        'status' => 'required',
      ]);
  
      $subcategorydata = subcategories::find($id);
      $subcategorydata->subcategories_name = $req->name;
      $subcategorydata->category_id = $req->category_id;
        if (request()->hasFile('subcategory_name')) {
        $file = request()->file('subcategory_name');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./uploads/subcategory/', $fileName);
        $subcategorydata->subcategories_image = $fileName;
      }
      $subcategorydata->status = $req->status;
      if ($subcategorydata->save()) {
        return redirect()->route('Subcategory.index')->with('success', 'Category successfully added');
      } else {
        return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
      }
    }

  function delete($id){
    subcategories:: find(base64_decode($id))->delete();
    return redirect()->route('Subcategory.index')->with('success','subcategory update successfuly');
    
  }
  
}
