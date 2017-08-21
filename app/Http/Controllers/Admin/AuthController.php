<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class AuthController extends Controller
{
	protected $redirectTo = '/admin';

	public function login() {

		return view('admin.auth.login', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));

	}

	public function authenticate(Request $request) {

		if ($this->guard()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {

			return redirect('admin/dashboard');

		} else {

			return view('admin.auth.login', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));

		}

	}

	public function logout() {

		Auth::logout();

		return redirect('admin/login');

	}

	public function register(Request $request) {

		if ($request->isMethod('post')) {

			Admin::create([
				'name'      => $request->get('name'),
				'surname'	=> $request->get('surname'),
				'email'     => $request->get('email'),
				'password'  => bcrypt($request->get('password'))
			]);

		}

		return redirect('admin/login');

	}

	public function checkout() {

		return view('member.checkout');

	}

	public function profile() {

		return view('member.profile');

	}

	 protected function guard() {
		 return Auth::guard('admin');
	 }

}
