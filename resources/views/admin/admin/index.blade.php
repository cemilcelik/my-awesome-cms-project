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
                <h1>List Admins</h1>
                <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>E-Mail</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Process</th>
                    </tr>
                    @forelse($admins as $admin)
                        <tr>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->surname  }}</td>
                            <td>{{ $admin->email  }}</td>
                            <td>{{ $admin->roles()->first() ? $admin->roles()->first()->display_name : '-' }}</td>
                            <td>{{ $admin->created_at  }}</td>
                            <td>
                                <form action="{{ route('admin.destroy', $admin) }}" method="post" class="form-inline">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.edit', $admin) }}" class="btn btn-primary b-tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
                                        <button type="submit" class="btn btn-danger b-tooltip" title="Delete"><i class="fa fa-minus-square"></i></button>
                                    </div>
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
@endsection
