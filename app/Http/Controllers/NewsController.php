<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view('news.index')->with('news', $news);
    }

    public function show($slug)
    {
        $news = News::whereTranslation('slug', $slug)->firstOrFail();

        return view('news.show')->with('news', $news);
    }
}
