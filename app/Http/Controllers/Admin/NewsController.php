<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
	public function index() {

		return view('admin.news.index', array('title' => 'Haberler', 'description' => '', 'page' => 'home'));

	}
}
