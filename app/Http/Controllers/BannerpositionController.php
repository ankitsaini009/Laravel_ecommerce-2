<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bannerposition; // Fix the use statement
use DataTables;

class BannerpositionController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data = Bannerposition::latest()->get(); // Fix the model name
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('Bannerposition.edit', [base64_encode($row->id)]) . '" class="edit btn btn-success btn-sm">Edit</a>
                                  <a href="'. route('Bannerposition.Delete', [base64_encode($row->id)]).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.Bannerposition.index');
    }
    public function add()
    {
      return view('admin.Bannerposition.add');
    }
    
    public function store(Request $req)
    {
     //echo"<pre>";print_r($req->all());die;
  
      $req->validate([
        'name' => 'required',
         'status' => 'required',
      ]);
   
      $colordata = new bannerposition;
      $colordata->name = $req->name;
        
      $colordata->status = $req->status;
      if ($colordata->save()) {
        return redirect()->route('Bannerposition.index')->with('success', 'Category successfully added');
      } else {
        return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
      }
    }

    public function edit($id)
    {
      $getcolor = bannerposition::findOrFail(base64_decode($id));
     // echo"<pre>";print_r( $getcolor->all());die;
      return view('admin.Bannerposition.edit', compact('getcolor'));
    }
  
    public function update($id,Request $req)
    {
     //echo"<pre>";print_r($req->all());die;
  
      $req->validate([
        'name' => 'required',
         'status' => 'required',
      ]);
   
      $colordata =bannerposition::find($id);
      $colordata->name = $req->name;
        
      $colordata->status = $req->status;
      if ($colordata->save()) {
        return redirect()->route('Bannerposition.index')->with('success', 'Category successfully added');
      } else {
        return redirect()->back()->withInput()->with('error', 'Error in Category add. Please try again');
      }
    }

    function delete($id){
        bannerposition::find(base64_decode($id))->delete();
        return redirect()->route('Bannerposition.index')->with('success','category succesfully update');
       }


}
