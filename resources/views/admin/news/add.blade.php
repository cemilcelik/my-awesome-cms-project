@extends('admin.layouts.sidebar')

@section('content')
    <style>
        h5 { font-weight: bold; }
    </style>
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <form action="{{ route('news.store') }}" method="post">
                    <h5>Date</h5>
                    <input type="text" name="datetime" class="form-control" required autofocus value="{{ date('Y-m-d H:i:s') }}">
                    @if ($errors->has("datetime"))
                        <div class="alert alert-danger">
                            {{ $errors->first("datetime") }}
                        </div>
                    @endif
                    <hr>
                    @foreach ($languages as $i => $language)
                        <h5>Title <sup>({{ $language->title }})</sup></h5>
                        <input type="text" name="title[{{ $language->id }}]" class="form-control" required value='{{ old("title.$language->id") }}'>
                        @if ($errors->has("title.$language->id")) 
                            <div class="alert alert-danger">
                                {{ $errors->first("title.$language->id") }}
                            </div>
                        @endif
                        <h5>Description <sup>({{ $language->title }})</sup></h5></h5>
                        <textarea name="description[{{ $language->id }}]" name="description" class="form-control" rows="10">{{ old("description.$language->id") }}</textarea>
                        <hr>
                    @endforeach
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </section>
@stop
