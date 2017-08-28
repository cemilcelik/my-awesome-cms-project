@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-right">
                @if (session('status'))
                    <div class="alert alert-{{ session('status')['type'] }}">
                        {{ session('status')['message'] }}
                    </div>
                @endif
                @forelse ($newsAll as $news)
                    <div>
                        {{ $news->language[0]->pivot->title }} - 
                        <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('news.edit', ['id' => $news->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('news.destroy', ['id' => $news->id]) }}" method="post" style="display:inline;">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button type='submit' class="btn btn-danger" value="Delete">Delete</button>
                        </form>
                    </div>
                @empty
                    <div>
                        No records found.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@stop
