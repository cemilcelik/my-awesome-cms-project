@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <h1>Edit Role</h1>
                <form action="{{ route('role.update', $role->id) }}" method="post">
                    <div class="form-group">
                        <label for="display_name" class="control-label">Display Name</label>
                        <input type="text" name="display_name" id="display_name" class="form-control" required minlength="5" value="{{ $role->display_name }}">
                    </div>
                    @if ($errors->has("display_name")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("display_name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required minlength="5" value="{{ $role->name }}">
                    </div>
                    @if ($errors->has("name")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required minlength="5" value="{{ $role->description }}">
                    </div>
                    @if ($errors->has("description")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("description") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="permission_id" class="control-label">Permissions</label>
                        <select name="permission_id[]" id="permission_id" class="form-control" multiple size="5" placeholder>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" {{ (in_array($permission->id, $role->perms()->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $permission->display_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has("permission_id")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("permission_id") }}
                        </div>
                    @endif
                    <hr>
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </section>
@stop
