<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

use validator, Auth;   

class AdminController extends Controller
{
    public function authenticate(Request $request){

        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required'

        ]);




        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password],$request->get('remember'))){

            return redirect()->route('admin.dashboard');


           } else{  
                session()->flash('error','Either Email/password is incorrect');
            return back()->withInput($request->only('email'));
           
        }
     }


     public function profile(){
        $getadmin = Admin::orderBy('id', 'desc')->first();
        return view('admin.profile',compact('getadmin'));
       }
   
       public function update($id,Request $request)
      {
         //echo "<pre>";print_r($request->all());die;
          $request->validate([
            'name' => 'required',
            'email' => 'required',
            ]);
         $admindata = admin::find($id);
         $admindata->name = $request->name;
         $admindata->email = $request->email;
       if(!empty($request->password)) { 
         $admindata->password = bcrypt($request->password);
       }
         if (request()->hasFile('profile')) {
            $file = request()->file('profile');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/banners/', $fileName);
            $admindata->profilepk = $fileName;
         }
          if ($admindata->save()) {
            return redirect()->route('admin.profile')->with('success', 'profile successfully updated');
         } else {
            return redirect()->back()->withInput()->with('error', 'Error in profile updated. Please try again');
      }
    }
   
   public  function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
     }
} 
        