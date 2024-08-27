<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\Country;
use DataTables;
use Validator,Auth; 


class StateController extends Controller
{
   
    public function index(){
         

        if (\request()->ajax()) {
            $data = state::with('Country')->latest()->get();
            //echo "<pre>";print_r($data->all());die;
             return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('State.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                <a href="'. route('State.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
              })
              ->addColumn('status', function ($row) {
                return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
            })
            
               
              ->rawColumns(['action','status'])
              ->make(true);
          }
          return view('admin.State.index');
        }

        public function add(){
            $getcont = Country::orderBy('id','desc')->get();
            return view('admin.State.add',compact('getcont'));
        }  
 
        public function store(Request $req)
    {
     // echo"<pre>";print_r($req->all());die;

      $req->validate([
        'name' => 'required',
        'State' => 'required',
        'State' => 'required',
         'status' => 'required',
      ]);
  
      $getcont = new State;
      $getcont->state_name = $req->name;
      $getcont->country_id = $req->State;

      $getcont->status = $req->status;
      if ($getcont->save()) {
        return redirect()->route('State.index')->with('success', 'Category successfully added');
      } else {
        return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
      }
    }

    public function edit($id)
    {
      $getState = State::findOrFail(base64_decode($id));
     // echo"<pre>";print_r( $getcolor->all());die;
     $getcont = Country::orderBy('id','desc')->get();

      return view('admin.State.edit', compact('getState','getcont'));
    }

    public function update($id,Request $req)
    {
     // echo"<pre>";print_r($req->all());die;
  
      $req->validate([
        'name' => 'required',
        'country_id' => 'required',
        'status' => 'required',
      ]);

      $getcont =State::find($id);
      $getcont->state_name = $req->name;
      $getcont->country_id = $req->country_id;
      $getcont->status = $req->status;
      if ($getcont->save()) {
        return redirect()->route('State.index')->with('success', 'Category successfully added');
      } else {
        return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
      }
    }

    function delete($id){
      State:: find(base64_decode($id))->delete();
      return redirect()->route('State.index')->with('success','subcategory update successfuly');
      
    }



}
