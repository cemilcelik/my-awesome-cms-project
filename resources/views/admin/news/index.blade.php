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
                    <tr>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Processes</th>
                    </tr>
                    @forelse ($newsAll as $news)
                        <tr>
                            <td>{{ $news->language[0]->pivot->title }}</td>
                            <td>{{ Carbon::parse($news->created_at)->format('d-m-Y') }}</td>
                            <td width="200">
                                <form action="{{ route('news.destroy', ['id' => $news->id]) }}" method="post" class="form-inline">
                                    <div class="btn-group">
                                        <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-warning b-tooltip" title="Show"><i class="fa fa-search-plus"></i></a>
                                        <a href="{{ route('news.edit', ['id' => $news->id]) }}" class="btn btn-primary b-tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
                                        <button type='submit' class="btn btn-danger b-tooltip" value="Delete" title="Delete"><i class="fa fa-minus-square"></i></button>
                                    </div>
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No records found.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
@stop
