@extends('layouts.app')
@section('content')
    <section>
        <div class="col">
            <ul>
                @foreach ($newsAll as $i => $news)
                    <li>
                        <a href="{{ $news->url }}">
                            {{ $news->language[0]->pivot->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@stop
