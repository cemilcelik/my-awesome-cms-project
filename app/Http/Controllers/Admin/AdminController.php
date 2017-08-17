<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}

    protected function guard()
    {
      return Auth::guard('admin');
    }

	public function index(){
		return view('admin.dashboard.index');
	}

	public function profile(){
		return view('admin.profile.index');
	}
}
