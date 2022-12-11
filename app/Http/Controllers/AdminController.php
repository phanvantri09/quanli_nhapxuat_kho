<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     //LOGINADMIN VỀ TRANG HOME//
     public function __construct()
     {
         $this->middleware('auth');
     }
     public function adminHome()
     {  
 
         //trang thống kê//
      
         $user = User::all();
 
         return view('admin.dashboard',compact('user'));
 
         //đưa post user qua dashbord//
     }
}
