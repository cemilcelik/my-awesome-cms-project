@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col">
                <form action="{{ route('media.update', $media) }}" method="post" id="form">
                    <div class="form-group row">
                        <label for="filename" class="col-3 col-form-label">File</label>
                        <div class="col-lg-4 col-6">
                            <div class="card">
                                <img class="card-img-top" src="{{ 'img/cache/large/media/' . $media->filename }}" alt="">
                            </div>
                        </div>
                    </div>
                    @foreach ($media->languages as $i => $language) 
                        <div class="form-group row">
                            <label for="title" class="col-3 col-form-label">Title <sup>{{ $language->title }}</sup></label>
                            <div class="col-9">
                                <input type="text" name="title[{{ $language->id }}]" class="form-control" value="{{ $language->pivot->title }}" required>
                                @if ($errors->has("title.$language->id"))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first("title.$language->id") }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group row">
                        <label for="active" class="col-3 col-form-label">Active</label>
                        <div class="col-9">
                            <input type="checkbox" name="active" id="active" value="1" {{ $media->active ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-9 ml-auto">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
@stop
