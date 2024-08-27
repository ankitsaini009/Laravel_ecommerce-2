<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use DataTables;
use Validator,Auth; 

class ColorController extends Controller
{
    public function index(){
        if (\request()->ajax()) {
            $data = Color::latest()->get();
            return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('Color.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                            <a href="'. route('Color.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
              })
              ->addColumn('status', function ($row) {
                return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
            })
            
               
              ->rawColumns(['action','status'])
              ->make(true);
          }
          return view('admin.Color.index');
        }

        public function add(){
            return view('admin.Color.add');
        }

     public function store(Request $req)
  {
    //echo"<pre>";print_r($req->all());die;

    $req->validate([
      'name' => 'required',
      'hex_value' => 'required',
      'status' => 'required',
    ]);
 
    $colordata = new Color;
    $colordata->color_name = $req->name;
    $colordata->hex_value = $req->hex_value;
     
    $colordata->status = $req->status;
    if ($colordata->save()) {
      return redirect()->route('Color.index')->with('success', 'Category successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }

  public function edit($id)
  {
        //echo"<pre>";print_r($req->all());die;

    $getcolor = Color::findOrFail(base64_decode($id));
   // echo"<pre>";print_r( $getcolor->all());die;
    return view('admin.Color.edit', compact('getcolor'));
  }

  public function update($id,Request $req)
  {
   //dd($req->all());
    $req->validate([
      'color_name' => 'required',
      'hex_value' => 'required',
      'status' => 'required',
    ]);
 
     $color =Color::find($id);
    $color->color_name = $req->color_name;
    $color->hex_value = $req->hex_value;
     
    $color->status = $req->status;
    if ($color->save()) {
      return redirect()->route('Color.index')->with('success', 'Category successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }
    
       function delete($id){
        Color::find(base64_decode($id))->delete();
        return redirect()->route('Color.index')->with('success','category succesfully update');
       }

    }   
 