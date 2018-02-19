@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    Address: Lorem ipsum dolor sit amet
                    <br> Phone: 0(555) 555 55 55
                    <br> Fax: 0(555) 555 55 55
                </div>
            </div>
        </div>
        <div class="col">
            <h2>Contact Form</h2>
            @if (session('msg'))
                <div class="alert alert-{{ session('msg')['type'] }}">
                    {{ session('msg')['text'] }}
                </div>
            @endif
            <form action="{{ route('contact-form-send') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name_surname">{{ __('common.name_surname') }}</label>
                    <input type="text" class="form-control" name="name_surname" id="name_surname" value="{{ old('name_surname') }}" autofocus>
                    @if ($errors->has('name_surname'))
                        <div class="alert alert-danger">
                            {{ $errors->first('name_surname') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">{{ __('common.email') }}</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="country">{{ __('common.city') }}</label>
                    <cities />
                </div>
                <div class="form-group">
                    <label for="country">{{ __('common.town') }}</label>
                    <towns />
                </div>
                <div class="form-group">
                    <label for="message">{{ __('common.message') }}</label>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="5">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="alert alert-danger">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">{{ __('common.send') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
