<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use DataTables;
use Validator,Auth; 

class CountryController extends Controller
{
    public function index(){
        if (\request()->ajax()) {
            $data = Country::latest()->get();
            return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('Country.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                            <a href="'. route('Country.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
              })
              ->addColumn('status', function ($row) {
                return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
            })
              ->rawColumns(['action','status'])
              ->make(true);
          }
          return view('admin.Country.index');
        }

        public function add(){
            return view('admin.Country.add');
        }

        public function store(Request $req)
        {
        //echo"<pre>";print_r($req->all());die;
      
          $req->validate([
            'name' => 'required',
             'status' => 'required',
          ]);
       
          $colordata = new Country;
          $colordata->countries_name = $req->name;
            
          $colordata->status = $req->status;
          if ($colordata->save()) {
            return redirect()->route('Country.index')->with('success', 'Category successfully added');
          } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
          }
        }

        public function edit($id)
        {
              //echo"<pre>";print_r($req->all());die;
      
          $getcolor = Country::findOrFail(base64_decode($id));
         // echo"<pre>";print_r( $getcolor->all());die;
          return view('admin.Country.edit', compact('getcolor'));
        }

        public function update($id,Request $req)
        {
        //echo"<pre>";print_r($req->all());die;
      
          $req->validate([
            'name' => 'required',
             'status' => 'required',
          ]);
       
          $colordata =Country::find($id);
          $colordata->countries_name = $req->name;
            
          $colordata->status = $req->status;
          if ($colordata->save()) {
            return redirect()->route('Country.index')->with('success', 'Category successfully added');
          } else {
            return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
          }
        }

        function delete($id){
          Country::find(base64_decode($id))->delete();
          return redirect()->route('Country.index')->with('success', 'Category successfully updated');

        }

}