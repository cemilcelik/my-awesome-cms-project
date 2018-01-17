@extends('layouts.app')
@section('content')
    <section>
        <div class="col">
            <ul>
                @foreach ($newsAll as $i => $news)
                    <li>
                        <div><a href="{{ $news->url }}">{{ $news->language[0]->pivot->title }}</a></div>
                        <div>{{ Carbon::parse($news->created_at)->format('d-m-Y')}}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@stop
