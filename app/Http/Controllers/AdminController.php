<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;
use App\User;

class AdminController extends Controller
{
    public function index(){
    	$user = User::where('id', '=', \Auth::user()->id)->firstOrFail();
    	$usersblogs = $user->posts;

    	return view('admin.index');
    }
}
