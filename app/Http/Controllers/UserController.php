<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
public function index()
{
   $users = User::whereNotNull('email')->get();

    Notification::send($users, new WelcomeNotification());

    return "All Users Mail Sent Successfully";

//    return view('dashboard');
}
}
