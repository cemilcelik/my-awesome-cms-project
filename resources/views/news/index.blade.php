@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <ul>
                        @foreach ($news as $value)
                            <li>
                                <a href="{{ route('news.show', $value->slug) }}">
                                    {{ $value->title }}
                                </a>                            
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop