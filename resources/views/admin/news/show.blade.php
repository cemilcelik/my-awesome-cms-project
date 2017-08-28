@extends('admin.layouts.sidebar')

@section('content')
    <style>
    h5 { font-weight: bold; }
    </style>
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <h5>Date</h5>
                {{ $news->datetime }}
                <hr>
                @foreach ($news->languages as $i => $language)
                    <h5>Title <sup>({{ $language->title }})</sup></h5>
                    {{ $language->pivot->title }}
                    <h5>Description <sup>({{ $language->title }})</sup></h5>
                    {{ $language->pivot->description }}
                    <hr>
                @endforeach
                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
        </div>
    </section>
@stop
