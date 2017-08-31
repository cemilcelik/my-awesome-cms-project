@extends('layouts.app')
@section('content')
    <section>
        <div class="col">
            <a href="{{ route('news') }}"><i class="fa fa-microchip"></i> News List</a>
            <h5>{{ $news->datetime }}</h5>
            <h1>{{ $newsLanguage[0]->pivot->title }}</h1>
            <p>{{ $newsLanguage[0]->pivot->description }}</p>
        </div>
    </section>
@stop
