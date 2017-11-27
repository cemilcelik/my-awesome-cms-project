@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12">
                @if (session('status'))
                    <div class="alert alert-{{ session('status')['type'] }}">
                        {{ session('status')['message'] }}
                    </div>
                @endif
                <div class="row">
                    @forelse ($medias as $media)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-6 mb-4">
                            <div class="card">
                                @if ($media->type == 'image') 
                                    <img class="card-img-top" src="{{ 'img/cache/large/media/' . $media->filename }}" alt="">
                                @else
                                    <img class="card-img-top" src="{{ 'img/cache/large/mime-types/' . $media->ext . '.png' }}" alt="">
                                @endif
                                <div class="card-body">
                                    <p class="card-text">{{ str_limit($media->language[0]->pivot->title, 20) }}</p>
                                    <form action="{{ route('media.destroy', $media->id) }}" method="post">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary b-tooltip" title="Show"><i class="fa fa-search-plus"></i></a>
                                            <a href="{{ route('media.edit', $media) }}" class="btn btn-warning b-tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
                                            <button type="submit" class="btn btn-danger b-tooltip" title="Delete"><i class="fa fa-minus-square"></i></button>
                                        </div>
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <p>No records found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@stop
