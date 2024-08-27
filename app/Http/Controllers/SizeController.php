<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\size;
    use DataTables;
use Validator,Auth; 

class SizeController extends Controller
{
    public function index(){
        if (\request()->ajax()) {
            $data = Size::latest()->get();
            return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('Size.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                            <a href="'. route('Size.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
              })
              ->addColumn('status', function ($row) {
                return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
            })
            
               
              ->rawColumns(['action','status'])
              ->make(true);
          }
          return view('admin.Size.index');
        }

        public function add(){
            return view('admin.Size.add');
        }   

        public function store(Request $req)
        {
         //echo"<pre>";print_r($req->all());die;
      
          $req->validate([
            'name' => 'required',
             'status' => 'required',
          ]);
       
          $colordata = new Size;
          $colordata->Size_name = $req->name;
            
          $colordata->status = $req->status;
          if ($colordata->save()) {
            return redirect()->route('Size.index')->with('success', 'Category successfully added');
          } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
          }
        }
        //echo"<pre>";print_r($req->all());die;


        public function edit($id)
  {
    $getcolor = Size::findOrFail(base64_decode($id));
   // echo"<pre>";print_r( $getcolor->all());die;
    return view('admin.Size.edit', compact('getcolor'));
  }

  public function update($id,Request $req)
        {
         //echo"<pre>";print_r($req->all());die;
      
          $req->validate([
            'name' => 'required',
             'status' => 'required',
          ]);
       
          $colordata =Size::find($id);
          $colordata->Size_name = $req->name;
          $colordata->status = $req->status;
          if ($colordata->save()) {
            return redirect()->route('Size.index')->with('success', 'Category successfully added');
          } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
          }
        }

        function delete($id){
            Size::find(base64_decode($id))->delete();
            return redirect()->route('Size.index')->with('success','category succesfully update');
           }
}
