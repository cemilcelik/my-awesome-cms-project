@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 text-left">
                <h1>Add Permission</h1>
                <form action="{{ route('permission.store') }}" method="post" id="form">
                    <div class="form-group">
                        <label for="display_name" class="control-label">Display Name</label>
                        <input type="text" name="display_name" id="display_name" class="form-control" value='{{ old("display_name") }}' required minlength="5">
                    </div>
                    @if ($errors->has("display_name")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("display_name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value='{{ old("name") }}' required minlength="5">
                    </div>
                    @if ($errors->has("name")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("name") }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" value='{{ old("description") }}' required minlength="5">
                    </div>
                    @if ($errors->has("description")) 
                        <div class="alert alert-danger">
                            {{ $errors->first("description") }}
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
