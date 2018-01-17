<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\News;
use App\Language;
use App\Media;

class NewsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $code = config('app.locale');

        $newsAll = News::with('language')->get();
        /*
        $newsAll = News::active()->with(['languages' => function ($query) use ($code) {
            $query->where('code', $code);
        }])->get();
        */

        return view('admin.news.index', compact('newsAll'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $languages = Language::all();

        return view('admin.news.add', compact('languages'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if ( ! $request->isMethod('post')) {
            return redirect(route('news.index'))
                ->with('status', ['type' => 'danger', 'message' => 'Invalid request method.']);
        }

        // validate
        $validator = $this->_validate($request);

        if ($validator->fails()) {
            return redirect(route('news.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $news = new News;
        $news->datetime = $request->datetime;
        $news->active = 1;
        $news->save();

        foreach ($request->title as $language_id => $value) {
            $data = [
                'title' => $request->title[ $language_id ],
                'description' => $request->description[ $language_id ]
            ];
            $news->languages()->attach($language_id, $data);
        }

        return redirect(route('news.index'))
            ->with('status', ['type' => 'success', 'message' => 'News is successfully create!']);

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $news = News::find($id);
        
        return view('admin.news.show', compact('news'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $news = News::find($id);

        // todo : if not found

        $medias = Media::all();

        return view('admin.news.edit', compact('news', 'medias'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        // request type control
        if ( ! $request->isMethod('put')) {
            return redirect(route('news.index'))
                ->with('status', ['type' => 'danger', 'message' => 'Invalid request method.']);
        }

        // validate
        $validator = $this->_validate($request);

        if ($validator->fails()) {
            return redirect(route('news.edit', ['id' => $id]))
                ->withErrors($validator)
                ->withInput();
        }

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

        // media table
        $news->medias()->sync($news->id, $request->mediaIds);

        dd($news);

        return redirect(route('news.index'))
            ->with('status', ['type' => 'success', 'message' => 'News is successfully update!']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        if ( ! $request->isMethod('delete')) {
            return redirect(route('news.index'))
                ->with('status', ['type' => 'danger', 'message' => 'Invalid request method.']);
        }

        News::destroy($id);

        return redirect(route('news.index'))
            ->with('status', ['type' => 'success', 'message' => 'News is successfully delete!']);
    }

    private function _validate(Request $request) {

        $rules = ['datetime' => 'required|date_format:Y-m-d H:i:s'];
        foreach ($request->title as $language_id => $value) {
            $rules['title.' . $language_id]         = 'required|string|min:5|max:255';
        }

        $validator = Validator::make($request->all(), $rules);

        return $validator;

    }
}
