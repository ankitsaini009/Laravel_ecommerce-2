<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Coupon;
use App\models\User;
use DataTables;

class CouponController extends Controller
{

  public function index()
  {
    //echo "<pre>";print_r($data->toarray());die;
    if (\request()->ajax()) {
      $data = Coupon::latest()->get();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '<a href="' . route('cupan.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                      <a href="' . route('cupan.Delete', [base64_encode($row->id)]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
          return $actionBtn;
        })
        ->addColumn('status', function ($row) {
          return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }
    return view('admin.Cupans.index');
  }

  public function add()
  {

    $users = User::orderBy('id', 'desc')->get();
    // dd($users->all()); 
    return view('admin.cupans.add', compact('users'));
  }


  public function store(Request $req)
  {

    //echo "<pre>";print_r($req->toArray());die;

    $req->validate([
      'code' => 'required',
      'user_id' => 'required', // 'user_id  ' se 'user_id' ko theek karen
      'amount' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'type' => 'required',
      'status' => 'required',
    ]);

    $cupandata = new Coupon;
    $cupandata->coupan_code = $req->code;
    $cupandata->user_id = $req->user_id;
    $cupandata->type = $req->type;
    $cupandata->amount = $req->amount;
    $cupandata->start_date = $req->start_date;
    $cupandata->end_date = $req->end_date;
    $cupandata->status = $req->status;

    if ($cupandata->save()) {
      return redirect()->route('cupan.index')->with('success', 'cupan successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }

  public function edit($id)
  {
    $getcupan = Coupon::findOrFail(base64_decode($id));
    return view('admin.cupans.edit', compact('getcupan'));
  }

  public function update($id, Request $req)
  {

    // echo "<pre>";print_r($req->toArray());die;

    $req->validate([
      'code' => 'required',
      //'user_id' => 'required', // 'user_id  ' se 'user_id' ko theek karen
      'amount' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'type' => 'required',
      'status' => 'required',
    ]);

    $cupandata = Coupon::find($id);
    $cupandata->coupan_code = $req->code;
   // $cupandata->user_id = $req->user_id;
    $cupandata->type = $req->type;
    $cupandata->amount = $req->amount;
    $cupandata->start_date = $req->start_date;
    $cupandata->end_date = $req->end_date;
    $cupandata->status = $req->status;

    if ($cupandata->save()) {
      return redirect()->route('cupan.index')->with('success', 'cupan successfully added');
    } else {
      return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
    }
  }
  function delete($id)
  {
    Coupon::find(base64_decode($id))->delete();
    return redirect()->route('cupan.index')->with('success', 'subcategory update successfuly');
  }

}

