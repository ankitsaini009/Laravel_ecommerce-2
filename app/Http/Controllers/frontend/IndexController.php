<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\category;
use App\Models\Page;
use App\Models\Brand;
use App\Models\Product;
use App\Models\size;
use App\Models\Color;
use App\Models\subcategories;
use App\Models\galleryimg;
use App\Models\configrable;
use App\Models\user;
use App\Models\cart;
use App\Models\country;
use App\Models\state;
use App\Models\city;
use App\Models\usersaddress;
use App\Models\Coupon;
use App\Models\front_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class IndexController extends Controller
{
    public function index()
    {
        $getbanner = Banner::where('status', 1)->get();
        $getcate = Category::where('status', 1)->get();
        $getpage = Page::where('status', 1)->get();
        $brandImages = Brand::where('status', 1)->get();
        $getproduct = Product::where('status', 1)->get();
        // echo "<pre>"; print_r($trendingProducts->toArray()); die;
        return view('frontend.index', compact('getbanner', 'getcate', 'getpage', 'brandImages', 'getproduct'));
    }


    public function about()
    {
        return view('frontend.about');
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function faq()
    {
        return view('frontend.faq');
    }

    public function shop($id)
    {
        // You can use the $id parameter to fetch specific data or perform actions based on the ID

        // Example: Fetching a product based on the ID
        $product = Product::find($id);
        $brands = Brand::where('status', 1)->get();
        $size = size::where('status', 1)->get();
        $colorlist = Color::where('status', 1)->get();
        $subcategory = subcategories::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        //dd($products->all());
        // You can add more logic here as needed
        // Return the view or data as needed
        return view('frontend.shop-grid-left', compact('product', 'brands', 'size', 'colorlist', 'subcategory', 'products'));
    }
    public function single($id)
    {
        $galleryimg = Galleryimg::where('product_id', $id)->get();
        $distinctSizes = configrable::select('size_id')
            ->where('product_id', $id)
            ->distinct()
            ->pluck('size_id');
        $prosize = $distinctSizes->toArray();
        $sizes = size::whereIn('id', $prosize)->get();
        $distinctColors = configrable::select('color_id')
            ->where('product_id', $id)
            ->distinct()
            ->pluck('color_id');
        $procolor = $distinctColors->toArray();
        $colors = Color::whereIn('id', $procolor)->get();
        $prolist = Product::where('id', $id)->get();
        $related = Product::where('id', $id)->first();
        $getsubcategory = Product::where('subcategory_id', $related->subcategory_id)->get();
        $user = Auth::guard('users')->user();
        //  echo "<pre>"; print_r($user->toArray()); die;
        return view('frontend.single', compact('prolist', 'galleryimg', 'sizes', 'colors', 'getsubcategory', 'user'));
    }
    public function getSizeData(Request $request)
    {
        $size = configrable::where('product_id', $request->productid)->where('size_id', $request->sizeid)->distinct('color_id')->pluck('color_id')->toArray();
        // dd( $size->all());

        $color = Color::whereIn('id', $size)->get();

        return response()->json($color);
    }
    public function login()
    {
        return view('frontend.login');
    }
    public function register(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ];
        // Validation
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // Create new user instance
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // Save user
        if ($user->save()) {
            return response()->json(['message' => 'Registration successful'], 200);

        } else {
            return response()->json(['error' => 'Failed to register user'], 500);
        }
    }
    public function loginpage(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials = $request->only('email', 'password');
        if (Auth::guard('users')->attempt($credentials)) {
            $user = Auth::guard('users')->user();
            Session::put('user_id', $user->id);
            return response()->json(['success' => true, 'message' => 'Login Successful']);
        } else {
            return response()->json(['error' => true, 'message' => 'Invalid credentials']);
        }
    }
    public function addToCart(Request $request)
    {
        $productqty = product::where('id', $request->product_id)->first();
        $cartdata = new cart;
        // echo 111;
        $cartdata->product_id = $request->product_id;
        $cartdata->user_id = $request->user_id;
        $cartdata->color_id = $request->color_id;
        $cartdata->size_id = $request->size_id;
        $cartdata->qty = $productqty->qty;
        // Save the cart item
        $cartdata->save();
        return response()->json(['success' => true, 'message' => 'Cart data saved successfully']);
    }
    public function cartList(Request $request)
    {
        $user = Auth::guard('front_user')->user();
        //  echo "<pre>"; print_r($user->toArray()); die;
        $cartItems = [];
        $cartItems = cart::with('products')->latest()->get();
        //echo "<pre>";print_r($cartItems->toArray());die;
        return view('frontend.cart', compact('cartItems'));
    }
    public function cartupdate(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); die;
        $error = false;
        if ($request->filled('quantity')) {
            foreach ($request->quantity as $cartId => $qty) {
                $cartdata = Cart::find($cartId);
                if ($cartdata) {
                    $cartdata->qty = $qty;
                    $cartdata->save();
                } else {
                    $error = true;
                    break;
                }
            }
            if (!$error) {
                return redirect()->route('frontend.cart');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Error in cart update. Please try again');
    }
    public function coupan(Request $request)
    {
        //dd($request->all());
        if ($request->has('coupan_code')) {
            $userId = Auth::guard('users')->User()->id;
            // dd($userId);
            $checkCoupon = Coupon::where('coupan_code', $request->coupan_code)
                ->where('user_id', $userId)
                ->whereDate('start_date', '<=', date('Y-m-d'))
                ->whereDate('end_date', '>=', date('Y-m-d'))
                ->first();
            if ($checkCoupon) {
                session()->put('coupan_code', $request->input('coupan_code'));
                $copndata = Coupon::where('coupan_code', session('coupan_code'))->first();

                $successmsg = "Coupon Applied Successfully.";
                return redirect()->route('frontend.chekout', compact('copndata'))->with('success', $successmsg);
            } else {
                $codeerr = "This coupon is expired or not valid.";
                return back()->with('error', $codeerr);
            }
        }
    }
    public function chekout()
    {
        if (Auth::guard('users')->check()) {
            // User is authenticated, so retrieve the user ID
            $userId = Auth::guard('users')->id();
            // Now you can proceed with the rest of your code
            $countrylist = country::orderBy('id', 'desc')->get();
            $statelist = state::orderBy('id', 'desc')->get();
            $citylist = city::orderBy('id', 'desc')->get();
            $getdata = usersaddress::where('user_id', $userId)->get();
            //echo "<pre>";print_r($getdata->toarray());die;
            $cartList = [];
            if ($userId) {
                $cartList = Cart::with('products')->where('user_id', $userId)->latest()->get();
                // $cupndata = Coupan::where('coupan_code', Session::get('coupon_code'))->first();
            }
            //  dd($statelist   ->all());
            return view('frontend.chekout', compact('countrylist', 'statelist', 'citylist', 'getdata', 'cartList'));
        }
    }
    public function addchek(Request $request)
    {
        //echo "<pre>";print_r($request->all());die;
        $request->validate(
            [
                'name' => 'required',
                'lname' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'postcode' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ]
        );
        $user = Auth::guard('users')->user();
        $city = new usersaddress;
        $city->frist_name = $request['name'];
        $city->last_name = $request['lname'];
        $city->country_id = $request['country'];
        $city->state_id = $request['state'];
        $city->city_id = $request['city'];
        $city->postcode = $request['postcode'];
        $city->address = $request['address'];
        $city->phone = $request['phone'];
        $city->email = $request['email'];
        $city->user_id = $user->id;
        if ($city->save()) {
            return redirect()->route('frontend.chekout')->with('success', 'Banner successfully added');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error in Banner add. Please try again');
        }
    }

    public function removeImage(Request $request)
    {
        // echo 111111;die;
        $cartId = $request->input('cart_id');

        $cartItem = Cart::find($cartId);

        if (!is_null($cartItem)) {
            $cartItem->delete();
            return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
        } else {
            return response()->json(['error' => false, 'message' => 'Cart item not found']);
        }
    }





}
