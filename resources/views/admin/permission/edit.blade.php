@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <form action="{{ route('permission.update', $permission->id) }}" method="post">
                    <h1>Edit Permission</h1>
                    <div class="form-group">
                        <label for="display_name" class="control-label">Display Name</label>
                        <input type="text" name="display_name" id="display_name" class="form-control" required minlength="5" value="{{ $permission->display_name }}">
                    </div>
                    @if ($errors->has("display_name")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("display_name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required minlength="5" value="{{ $permission->name }}">
                    </div>
                    @if ($errors->has("name")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required minlength="5" value="{{ $permission->description }}">
                    </div>
                    @if ($errors->has("description")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("description") }}
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
