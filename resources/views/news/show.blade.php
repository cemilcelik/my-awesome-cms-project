@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('news') }}"><i class="fa fa-list"></i> News List</a>
                    <h5>{{ $news->datetime }}</h5>
                    <h1>{{ $newsLanguage[0]->pivot->title }}</h1>
                    <p>{{ $newsLanguage[0]->pivot->description }}</p>
                </div>
            </div>
        </div>
    </section>
@stop
