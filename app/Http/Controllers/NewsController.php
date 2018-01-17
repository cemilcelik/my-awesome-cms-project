<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsAll = News::with('language')->get();

        return view('news.index', compact('newsAll'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        // todo try take single resourse (news, news_language)
        // todo try take single variable instead of array

        $news = News::findOrFail($id); // auto-handler exception

        $newsLanguage = $news->language;
        $newsMedias = $news->medias;

        return view('news.show', compact('news', 'newsLanguage', 'newsMedias'));
    }
}
