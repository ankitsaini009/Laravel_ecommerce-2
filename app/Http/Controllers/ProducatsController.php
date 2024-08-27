<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use DataTables;
use App\models\Brand;
use App\models\category;
use App\models\Subcategories;
use App\models\size;
use App\models\Color;
use App\models\galleryimg;
use App\models\configrable;

class ProducatsController extends Controller
{

    public function index()
    {
        //       echo "<pre>";print_r($data->toArray());
        //   die;
        if (\request()->ajax()) {
            $data = Product::with('Brand', 'category', 'subcategosry')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->product_type == 2) {
                        $actionBtn = '<a href="' . route('Products.edit', [base64_encode($row->id)]) . '" class="btn btn-success btn-sm">Edit</a> 
                                      <a href="' . route("Products.Delete", $row->id) . '" class="btn btn-danger btn-sm">Delete</a>   <a href="' . route("product.color", $row->id) . '" class="btn btn-primary btn-sm">Color</a>';
                    } else {
                        $actionBtn = '<a href="' . route('Products.edit', [base64_encode($row->id)]) . '" class="btn btn-success btn-sm">Edit</a> 
                                      <a href="' . route("Products.Delete", $row->id) . '" class="btn btn-danger btn-sm"  >Delete</a>';
                    }
                    return $actionBtn;
                })


                ->addColumn('status', function ($row) {
                    return $row->status == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                })

                ->addColumn('main_image', function ($row) {
                    return '<img src="' . asset('/uploads/banners/' . $row->main_image) . '" alt="banners Image" width="60" height="60">';
                })
                ->rawColumns(['main_image', 'action', 'status'])
                ->make(true);
        }

        return view('admin.Products.index');
    }
    public function add()
    {
        $getbrand = Brand::orderby('id', 'desc')->get();
        $getcadat = category::orderby('id', 'desc')->get();
        $getsubdat = Subcategories::orderby('id', 'desc')->get();
        $getsize = size::orderby('id', 'desc')->get();
        $getcolor = Color::orderby('id', 'desc')->get();

        return view('admin.Products.add', compact('getbrand', 'getcadat', 'getsubdat', 'getsize', 'getcolor'));
        // dd($getsubdat->all());
    }
    public function store(Request $request)
    {
        // echo"<pre>";print_r($request->all());die;
        // dd($request->all());
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'is_featured' => 'required',
            'is_latest' => 'required',
            'status' => 'required',
            'product_type' => 'required',

        ]);

        $datapages = new Product;

        $existingCode = Product::where('code', $request->code)->exists();
        if ($existingCode) {
            return redirect()->back()->withErrors(['code' => 'This code already exists']);
        } else {
            $datapages->code = $request->input('code');
        }
        $datapages->name = $request->input('name');
        $datapages->description = $request->input('description');
        $datapages->Qty = $request->input('qty');
        $datapages->brand_id = $request->input('brand_id');
        $datapages->category_id = $request->input('category_id');
        $datapages->subcategory_id = $request->input('subcategory_id');
        $datapages->mrp_price = $request->input('price');
        $datapages->price = $request->input('sale_price');
        $datapages->is_featured = $request->input('is_featured');
        $datapages->is_latest = $request->input('is_latest');
        $datapages->product_type = $request->input('product_type');
        $datapages->Status = $request->input('status');

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('uploads/banners/', $fileName);
            $datapages->main_image = $fileName;
        }

        if ($request->hasFile('back_img')) {
            $file = $request->file('back_img');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('uploads/banners/', $fileName);
            $datapages->back_img = $fileName;
        }


        if ($datapages->save()) {
            $lastInsertedID = $datapages->id;
            if (request()->hasFile('galleryimage')) {
                foreach ($request->file('galleryimage') as $key => $file) {
                    $galleryimg = new galleryimg;
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move('./uploads/banners/', $fileName);
                    $galleryimg->galleryimg = $fileName;
                    $galleryimg->product_id = $lastInsertedID;
                    $galleryimg->save();
                }                   
            }
            foreach ($request['addsize'] as $key => $size) {
                $ADD = new configrable;
                $ADD->product_id = $lastInsertedID;
                $ADD->size_id = $request['addsize'][$key];
                $ADD->color_id = $request['addcolor'][$key];
                $ADD->qty = $request['addqty'][$key];
                $ADD->save();
            }
            return redirect()->route('Products.index')->with('success', 'Product successfully added');
        } else {
            return back()->withInput()->with('error', 'Error in product add. Please try again');
        }
    }
    public function edit($id)
    {
        $decodedId = base64_decode($id);
        $getproduct = Product::findOrFail($decodedId);
        //  echo "<pre>";print_r($getproduct->all());die;
        $getbrand = brand::orderBy('id', 'desc')->get();
        $getcadat = category::orderBy('id', 'desc')->get();
        $getsubcategory = Subcategories::orderBy('id', 'desc')->get();
        $sizedata = size::orderBy('id', 'desc')->get();
        $colordata = Color::orderBy('id', 'desc')->get();
        $getgalleryimg = galleryimg::where('product_id', $decodedId)->get();
        $configration = configrable::where('product_id', $decodedId)->get();
        //    echo "<pre>";print_r($configration->all());die;
        return view('admin.Products.edit', compact('getproduct', 'getbrand', 'getcadat', 'getsubcategory', 'sizedata', 'colordata', 'getgalleryimg', 'configration'));
    }

    public function subcategory(Request $request)
    {
        $category_id = $request->input('catid');
        $subcategory = Subcategories::where('category_id', $category_id)->get();
        return response()->json($subcategory);
    }

    public function update($id, Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die;
        // dd($request->all());
        $request->validate([
            
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'is_featured' => 'required',
            'is_latest' => 'required',
            'status' => 'required',
            'product_type' => 'required',
        ]);

        $datapages = Product::find($id);
        $datapages->code = $request->input('code');
        $datapages->name = $request->input('name');
        $datapages->description = $request->input('description');
        $datapages->Qty = $request->input('qty');
        $datapages->brand_id = $request->input('brand_id');
        $datapages->category_id = $request->input('category_id');
        $datapages->subcategory_id = $request->input('subcategory_id');
        $datapages->mrp_price = $request->input('price');
        $datapages->price = $request->input('sale_price');
        $datapages->is_featured = $request->input('is_featured');
        $datapages->is_latest = $request->input('is_latest');
        $datapages->product_type = $request->input('product_type');
        $datapages->Status = $request->input('status');


        if ($request->hasFile('main_image')) {
 
            $file = $request->file('main_image');

            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('uploads/banners/', $fileName);
            $datapages->main_image = $fileName;
        }
        $lastInsertedID = $datapages->id;

        if ($datapages->save()) {
            foreach ($request['addsize'] as $key => $size) {
                if ($request['allreadyadded'][$key] == 0) {
                    $condata = new configrable;
                    $condata->product_id = $id;
                    $condata->size_id = $request['addsize'][$key];
                    $condata->color_id = $request['addcolor'][$key];
                    $condata->qty = $request['addqty'][$key];
                    $condata->save();

                } else {
                    $condata = configrable::find($request['allreadyadded'][$key]);
                    $condata->product_id = $id;
                    $condata->size_id = $request['addsize'][$key];
                    $condata->color_id = $request['addcolor'][$key];
                    $condata->qty = $request['addqty'][$key];
                    $condata->save();
                }
            }



            if (request()->hasFile('galleryimage')) {
                foreach ($request->file('galleryimage') as $key => $file) {
                    $galleryimg = new galleryimg;
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move('./uploads/banners/', $fileName);
                    $galleryimg->galleryimg = $fileName;
                    $galleryimg->product_id = $lastInsertedID;
                    $galleryimg->save();
                }
            }
            return redirect()->route('Products.index')->with('success', 'Product successfully added');
        } else {
            return back()->withInput()->with('error', 'Error in product add. Please try again');
        }
    }
    function delete($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
            return redirect()->back()->with('success', 'Products successfully deleted');
        }
    }
    public function gallerydelete(Request $request)
    {
        $galleryid = $request->input('galleryid');

        $galleryItem = GalleryImg::find($galleryid);
        if (!is_null($galleryItem)) {
            $galleryItem->delete();
            return response()->json(['success' => true]);
        }
    }
    public function reovedelete(Request $request)
    {
        $id = $request->input('id');
        $idItem = configrable::find($id);
        if (!is_null($idItem)) {
            $idItem->delete();
            return response()->json(['success' => true]);
        }
    }

    public function color($id)
    {
        $distinctcolor = configrable::select('color_id')
            ->where('product_id', $id)
            ->distinct()
            ->pluck('color_id');

        $procolor = $distinctcolor->toArray();

        $mycolor = color::whereIn('id', $procolor)->get();
        foreach ($mycolor as $colorkey => $colorval) {

            $getgallery = galleryimg::where('product_id', $id)->where('color_id', $colorval->id)->get();
            $mycolor[$colorkey]->images = $getgallery;

        }
       //echo "<pre>";print_r($mycolor->toArray());die;
 
        return view('admin.products.color', compact('mycolor', 'id'));
    }
    public function coloruptate($id, Request $request)
    {
        //echo "<pre>";print_r($request->toArray());die;
     
        if ($request->colorimage) {
            foreach ($request->file('colorimage') as $color_id => $file) {
                foreach ($file as $namekey => $newname) {

                    $imagdata = new galleryimg;
                    $imagdata->product_id = $id;
                    $imagdata->color_id = $color_id;
                    $fileName = md5($newname->getClientOriginalName() . time()) . "." . $newname->getClientOriginalExtension();
                    $newname->move(public_path('uploads/banners/'), $fileName);
                    $imagdata->galleryimg = $fileName;

                    $imagdata->save();

                }
            }

            return redirect()->route('Products.index')->with('success', 'Color images successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in updating color images. Please try again');
        }
    }

        




}