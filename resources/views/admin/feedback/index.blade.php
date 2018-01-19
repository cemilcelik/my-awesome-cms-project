@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <th>Name Surname</th>
                        <th>E-Mail</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Processes</th>
                    </tr>
                    @forelse ($feedbacks as $key => $feedback)
                        <tr>
                            <td>{{ $feedback->name_surname }}</td>
                            <td>{{ $feedback->email }}</td>
                            <td>{{ str_limit($feedback->message, 50) }}</td>
                            <td>{{ Carbon::parse($feedback->created_at)->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="form-inline">
                                    <div class="btn-group">
                                        <a href="{{ route('feedback.show', $feedback->id) }}" class="btn btn-warning b-tooltip" title="Show"><i class="fa fa-search-plus"></i></a>
                                        <button type="submit" href="javascript:;" class="btn btn-danger b-tooltip" title="Delete"><i class="fa fa-minus-square"></i></button>
                                    </div>
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">There is no record.</td>
                        </tr>
                    @endforelse
                </table>
                {{ $feedbacks->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
