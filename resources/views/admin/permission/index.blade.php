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
                <h1>List Permissions</h1>
                <table class="table table-hover">
                    <tr>
                        <th>Display Name</th>
                        <th>Name</th>
                        <th>Processes</th>
                    </tr>
                    @forelse ($permissionAll as $permission)
                        <tr>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->name }}</td>
                            <td width="200">
                                <form action="{{ route('permission.destroy', ['id' => $permission->id]) }}" method="post" class="form-inline">
                                    <div class="btn-group">
                                        <a href="{{ route('permission.edit', ['id' => $permission->id]) }}" class="btn btn-primary b-tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
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
