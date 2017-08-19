@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h5>#{{ $news->id }}</h5>
                    <h1>{{ $news->title }}</h1>
                    <p>{{ $news->description }}</p>
                </div>
            </div>
        </div>
    </section>
@stop
