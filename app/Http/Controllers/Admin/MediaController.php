<?php

namespace App\Http\Controllers\Admin;

use App\Media;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::with('language')->get();
        // dd($medias);    
        return view('admin.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->_validate($request);

        if ($validator->fails()) {
            return redirect(route('media.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $files = $request->file('filename');

        foreach ($files as $file) {
            $path = $file->store('media', 'public');

            list($type, $detail) = explode('/', $file->getClientMimeType());

            $media              = new Media;
            $media->ext         = $file->getClientOriginalExtension();
            $media->type        = $type;
            $media->filename    = $path;
            $media->save();
            
            foreach (Language::all() as $lang) {
                $media->languages()->attach($lang->id, ['title' => $file->getClientOriginalName()]);
            }
        }

        return redirect(route('media.index'))
            ->with('status', ['type' => 'success', 'message' => 'Media is successfully create!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media, $id)
    {
        $media = $media->find($id);
        return view('admin.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media, $id)
    {
        $media = $media->find($id);

        $validator = $this->_validate2($request);

        if ($validator->fails()) {
            return redirect(route('media.edit', $media))
                ->withErrors($validator)
                ->withInput();
        }

        $media->active = $request->active ?: 0;
        $media->save();

        foreach ($request->title as $language_id => $value) {
            $data = [
                'title' => $request->title[ $language_id ]
            ];
            $media->languages()->updateExistingPivot($language_id, $data);
        }

        return redirect(route('media.index'))
            ->with('status', ['type' => 'success', 'message' => 'Media is successfully update!']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media, $id)
    {
        $media = $media->find($id);
        $media->delete();

        return redirect(route('media.index'))
            ->with('status', ['type' => 'success', 'message' => 'Media is successfully delete!']);
    }

    private function _validate(Request $request)
    {
        // todo : different control of filesize for image, file and video types

        $rules = array(
            'filename.*' => 'required|mimes:jpg,png,pdf,mp4|max:5000'
        );

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }

    private function _validate2(Request $request)
    {
        $rules = [
            'title.*'   => 'required|string|min:5|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
