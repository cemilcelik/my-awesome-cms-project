@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <ul>
                        @foreach ($newsAll as $i => $news)
                            <li>
                                <a href="{{ route('news.show', $news->id) }}">
                                    {{ $news->language[0]->pivot->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop
