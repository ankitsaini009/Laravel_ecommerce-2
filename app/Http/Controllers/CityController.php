<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;
use App\Models\State;
use App\Models\Country;
use DataTables;

class CityController extends Controller
{

  public function index()
  {
 //echo "<pre>";print_r($data->toarray());die;
    if (\request()->ajax()) {
      $data = City::with('country', 'State')->latest()->get();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '<a href="' . route('City.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                      <a href="' . route('City.Delete', [base64_encode($row->id)]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
          return $actionBtn;
        })
        ->addColumn('status', function ($row) {
          return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }
    return view('admin.City.index');
  }

  public function add()
  {
    $getstate = State::orderBy('id', 'desc')->get();
    $getcategory = country::orderBy('id', 'desc')->get();
    return view('admin.City.add', compact('getstate', 'getcategory'));
  }
   
  public function store(Request $req)
  {
    // echo"<pre>";print_r($req->all());die;

    $req->validate([
      'name' => 'required',
      'State' => 'required',
      'category' => 'required',
      'status' => 'required',
    ]);

    $citydata = new City;
    $citydata->city_name = $req->name;
    $citydata->state_id = $req->State;
    $citydata->country_id = $req->country;

    $citydata->status = $req->status;
    if ($citydata->save()) {
      return redirect()->route('City.index')->with('success', 'Category successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }

  public function edit($id)
  {
    $getcity = city::findOrFail(base64_decode($id));
    //echo "<pre>";print_r($getcity->toArray());die;
    $category = country::orderBy('id', 'desc')->get();
    $getstate = state::orderBy('id', 'desc')->get();
    //echo "<pre>";print_r($category->all());die;
    return view('admin.City.edit', compact('getstate','getcity','category'));
  }

  public function update($id,Request $req)
  {
    // echo"<pre>";print_r($req->all());die;

    $req->validate([
      'name' => 'required',
      'State' => 'required',
      'country' => 'required',
      'status' => 'required',
    ]);

    $citydata =City::find($id);
    $citydata->city_name = $req->name;
    $citydata->state_id = $req->State;
    $citydata->country_id = $req->country;
    $citydata->status = $req->status;
    if ($citydata->save()) {
      return redirect()->route('City.index')->with('success', 'Category successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }

  function delete($id)
  {
    City::find(base64_decode($id))->delete();
    return redirect()->route('City.index')->with('success', 'subcategory update successfuly');

  }






}
