@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-center">
                <ul>
                    @foreach ($news as $value)
                        <li><a href="#">{{ $value->relations->languages()->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@stop
