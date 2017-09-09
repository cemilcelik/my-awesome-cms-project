@extends('admin.layouts.sidebar')

@section('content')
    <section>
        <div class="row">
            <div class="col">
                <form action="{{ route('media.store') }}" method="post" id="form" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="filename" class="col-3 col-form-label">File(s)</label>
                        <div class="col-9">
                            <input type="file" name="filename[]" id="filename" class="form-control-file" required multiple>
                            @if ($errors->has("filename.*"))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first("filename.*") }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-9 ml-auto">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
@stop
