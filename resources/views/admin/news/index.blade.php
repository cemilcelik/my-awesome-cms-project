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
                <table class="table">
                    @forelse ($newsAll as $news)
                        <tr>
                            <td>{{ $news->language[0]->pivot->title }}</td>
                            <td width="200">
                                <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-warning b-tooltip" title="Show"><i class="fa fa-search-plus"></i></a>
                                <a href="{{ route('news.edit', ['id' => $news->id]) }}" class="btn btn-primary b-tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
                                <form action="{{ route('news.destroy', ['id' => $news->id]) }}" method="post" style="display:inline;">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type='submit' class="btn btn-danger b-tooltip" value="Delete" title="Delete"><i class="fa fa-minus-square"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No records found.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
@stop