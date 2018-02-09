@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <h1>Add Admin</h1>
                <form action="{{ route('admin.store') }}" method="post" id="form">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    @if ($errors->has("name"))
                        <div class="alert alert-danger">
                            {{ $errors->first("name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label">Surname</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
                    </div>
                    @if ($errors->has("surname"))
                        <div class="alert alert-danger">
                            {{ $errors->first("surname") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label">E-Mail</label>
                        <input type="text" name="email" id="email" class="form-control email" value="{{ old('email') }}" required>
                    </div>
                    @if ($errors->has("email"))
                        <div class="alert alert-danger">
                            {{ $errors->first("email") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
                    </div>
                    @if ($errors->has("password"))
                        <div class="alert alert-danger">
                            {{ $errors->first("password") }}
                        </div>
                    @endif
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Role</label>
                        <select name="role_id" id="role_id" class="custom-select" required>
                            <option value="">Please Select</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ ($role->id == old('role_id')) ? 'selected' : '' }}>{{ $role->display_name }}</option>
                            @endforeach
                            <option value="999">Fake</option>
                        </select>
                    </div>
                    @if ($errors->has("role_id"))
                        <div class="alert alert-danger">
                            {{ $errors->first("role_id") }}
                        </div>
                    @endif
                    <hr>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </section>
@stop
