<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin.home');
    }
    public function logout()
    {
       Auth::logout();
       $notification=array('messege' =>'Successfully Logout' ,'alert-type'=>'success' );
        return redirect()->route('admin.login')->with($notification);
    }
}
