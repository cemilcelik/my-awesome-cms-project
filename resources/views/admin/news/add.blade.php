@extends('admin.layouts.sidebar')

@section('content')
    <style>
        h5 { font-weight: bold; }
    </style>
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <form action="{{ route('news.store') }}" method="post">
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <input type="text" name="datetime" class="form-control" value="{{ date('Y-m-d H:i:s') }}" data-validation="datetime">
                    </div>
                    @if ($errors->has("datetime"))
                        <div class="alert alert-danger">
                            {{ $errors->first("datetime") }}
                        </div>
                    @endif
                    @foreach ($languages as $i => $language)
                        <div class="form-group">
                            <label for="title[{{ $language->id }}]" class="control-label">Title <sup>({{ $language->title }})</sup></label>
                            <input type="text" name="title[{{ $language->id }}]" id="title[{{ $language->id }}]" class="form-control" value='{{ old("title.$language->id") }}' data-validation="length alphanumeric" data-validation-length="min4">
                        </div>
                        @if ($errors->has("title.$language->id")) 
                            <div class="alert alert-danger">
                                {{ $errors->first("title.$language->id") }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="description[{{ $language->id }}]" class="control-label">Description <sup>({{ $language->title }})</sup></label>
                            <textarea name="description[{{ $language->id }}]" id="description[{{ $language->id }}]" name="description" class="form-control" rows="10">{{ old("description.$language->id") }}</textarea>
                        </div>
                    @endforeach
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </section>
@stop
