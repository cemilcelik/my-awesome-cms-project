@extends('layouts.app')
@section('content')
    <section>
        <div class="col">
            <a href="{{ route('news') }}"><i class="fa fa-microchip"></i> {{ __('common.news_list') }}</a>
            
            <h5>{{ $news->datetime }}</h5>
            <h1>{{ $newsLanguage[0]->pivot->title }}</h1>
            <p>{{ $newsLanguage[0]->pivot->description }}</p>

            @if ($newsMedias->count() > 0)
                <h3>{{ __('common.news_medias') }}</h3>
                <div class="simplelightbox">
                    <div class="row" >
                        @foreach ($newsMedias as $i => $media)
                            <div class="col-2">
                                <a href="{{ 'img/cache/large/media/' . $media->filename }}">
                                    <img src="{{ 'img/cache/large/media/' . $media->filename }}" class="img-fluid">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@stop
