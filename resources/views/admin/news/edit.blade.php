@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <form action="{{ route('news.update', $news->id) }}" method="post">
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <input type="text" name="datetime" id="datetime" class="form-control datetime" required autofocus value="{{ $news->datetime }}">
                    </div>
                    @if ($errors->has("datetime"))
                        <div class="alert alert-danger">
                            {{ $errors->first("datetime") }}
                        </div>
                    @endif
                    <hr>
                    @foreach ($news->languages as $i => $language)
                        <div class="form-group">
                            <label for="title-{{ $language->id }}" class="control-label">Title <sup>({{ $language->title }})</sup></label>
                            <input type="text" name="title[{{ $language->id }}]" id="title-{{ $language->id }}" class="form-control" required value="{{ $language->pivot->title }}">
                        </div>
                        @if ($errors->has("title.$language->id")) 
                            <div class="alert alert-danger">
                                {{ $errors->first("title.$language->id") }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="description[{{ $language->id }}]" class="control-label">Description <sup>({{ $language->title }})</sup></label>
                            <textarea name="description[{{ $language->id }}]" class="form-control" rows="10">{{ $language->pivot->description }}</textarea>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        @foreach ($medias as $i => $media)
                            <div class="col-2">
                                @if ($media->type == 'image')
                                    <input type="checkbox" id="{{ 'image-' . $media->id }}" name="mediaIds[]" value="{{ $media->id }}" {{ $media->isChecked }}>
                                    <label for="{{ 'image-' . $media->id }}"><img src="{{ 'img/cache/large/' . $media->filename }}" class="img-fluid"></label>
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
