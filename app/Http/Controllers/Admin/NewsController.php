<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Controllers\Controller;
use App\News;
use App\Language;
use App\Media;
use Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|news-manager');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $code = config('app.locale');

        $newsAll = News::with('language')->get();

        return view('admin.news.index', compact('newsAll'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        if ( ! Auth::user()->can('store-news')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Access denied.']);

        $languages = Language::all();

        $medias = Media::all();

        return view('admin.news.add', compact('languages', 'medias'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Request\Admin\NewsRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(NewsRequest $request)
    {
        if ( ! $request->isMethod('post')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Invalid request method.']);

        if ( ! Auth::user()->can('store-news')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Access denied.']);   

        $news = new News;
        
        // main table
        $news->datetime = $request->datetime;
        $news->active = 1;
        $news->save();

        // intermediate table
        foreach ($request->title as $language_id => $value) {
            $data = [
                'title' => $request->title[ $language_id ],
                'description' => $request->description[ $language_id ]
            ];
            $news->languages()->attach($language_id, $data);
        }

        // mediable table
        $news->medias()->sync($request->mediaIds);

        return redirect(route('news.index'))->with('status', ['type' => 'success', 'message' => 'News is successfully create!']);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(News $news)
    {
        if ( ! Auth::user()->can('update-news')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Access denied.']);
        
        $news_medias = $news->medias;

        // todo : if not found

        $medias = Media::all();

        // inject checked ones
        $medias->each(function($item, $key) use ($news_medias) {
            $item->isChecked = $news_medias->contains($item) ? 'checked' : '';
        });

        return view('admin.news.edit', compact('news', 'medias'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(NewsRequest $request, $id)
    {
        // request type control
        if ( ! $request->isMethod('put')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Invalid request method.']);

        if ( ! Auth::user()->can('update-news')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Access denied.']);

        $news = News::find($id);
        
        // main table
        $news->datetime = $request->datetime;
        $news->save();

        // intermediate table
        foreach ($request->title as $language_id => $value) {
            $data = [
                'title'         => $request->title[ $language_id ], 
                'description'   => $request->description[ $language_id ]
            ];
            $news->languages()->updateExistingPivot($language_id, $data);
        }

        // mediable table
        $news->medias()->sync($request->mediaIds);

        return redirect(route('news.index'))->with('status', ['type' => 'success', 'message' => 'News is successfully update!']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(News $news, Request $request)
    {
        if ( ! $request->isMethod('delete')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Invalid request method.']);
        
        if ( ! Auth::user()->can('delete-news')) 
            return redirect(route('news.index'))->with('status', ['type' => 'danger', 'message' => 'Access denied.']);

        $news->delete();

        return redirect(route('news.index'))->with('status', ['type' => 'success', 'message' => 'News is successfully delete!']);
    }
}
