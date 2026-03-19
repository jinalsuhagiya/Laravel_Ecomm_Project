<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
           if (auth()->check() && auth()->user()->user_type === 'user') {
            return view('dashboard');
            }
             elseif(auth()->check() && auth()->user()->user_type === 'admin') {
                return view('admin.dashboard');
        
    }
}
}
