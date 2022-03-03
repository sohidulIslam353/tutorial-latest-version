<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //__deposite money function__//
    public function password_change()
    {
        return view('password_change');
    }

    public function resend()
    {
       
    }


   
    //__password update__//
    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|max:16|string|confirmed',
            'password_confirmation' => 'required',
        ]);

        // $user=Auth::user();

        if (Hash::check($request->current_password,Auth::user()->password)) {

             // $user->password=Hash::make($request->password);  //hasing password from input field
             // $user->save();
            // $data=array(
            //     'password' => Hash::make($request->password),
            // );

            $data=array();
            $data['password']=Hash::make($request->password);
            DB::table('users')->where('id',Auth::id())->update($data);
            Auth::logout();
            return redirect()->route('login');

        }else{
            return redirect()->back()->with('error','Current Password Not Matched!');
        }

    }
    
}
