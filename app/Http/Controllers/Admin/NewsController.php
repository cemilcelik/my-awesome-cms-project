<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
	public function index() {

        $news = News::latest()->get();
		return view('admin.news.index')->with('news', $news);

	}
}
