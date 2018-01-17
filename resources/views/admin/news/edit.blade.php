@extends('admin.layouts.sidebar')

@section('content')
    <style>
        h5 { font-weight: bold; }
    </style>
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <form action="{{ route('news.update', $news->id) }}" method="post">
                    <h5>Date</h5>
                    <input type="text" name="datetime" class="form-control" required autofocus value="{{ $news->datetime }}">
                    @if ($errors->has("datetime"))
                        <div class="alert alert-danger">
                            {{ $errors->first("datetime") }}
                        </div>
                    @endif
                    <hr>
                    @foreach ($news->languages as $i => $language)
                        <h5>Title <sup>({{ $language->title }})</sup></h5>
                        <input type="text" name="title[{{ $language->id }}]" class="form-control" required value="{{ $language->pivot->title }}">
                        @if ($errors->has("title.$language->id")) 
                            <div class="alert alert-danger">
                                {{ $errors->first("title.$language->id") }}
                            </div>
                        @endif
                        <h5>Description <sup>({{ $language->title }})</sup></h5>
                        <textarea name="description[{{ $language->id }}]" name="description" class="form-control" rows="10">{{ $language->pivot->description }}</textarea>
                    @endforeach
                    <hr>
                    <div class="row">
                        @foreach ($medias as $i => $media)
                            <div class="col-2">
                                @if ($media->type == 'image')
                                    <input type="checkbox" id="{{ 'image-' . $media->id }}" name="mediaIds[]" value="{{ $media->id }}" {{ $media->isChecked }}>
                                    <label for="{{ 'image-' . $media->id }}"><img src="{{ 'img/cache/large/media/' . $media->filename }}" class="img-fluid"></label>
                                @else
                                    <img src="{{ 'img/cache/large/media-types/' . $media->type . '.png' }}" class="img-fluid">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </section>
@stop
