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
                <h1>List Roles</h1>
                <table class="table table-hover">
                    <tr>
                        <th>Display Name</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Processes</th>
                    </tr>
                    @forelse ($roleAll as $role)
                        <tr>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ str_limit(implode(', ', $role->perms()->pluck('display_name')->toArray()), 60) }}</td>
                            <td width="200">
                                <form action="{{ route('role.destroy', ['id' => $role->id]) }}" method="post" class="form-inline">
                                    <div class="btn-group">
                                        <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-primary b-tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
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
