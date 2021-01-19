@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <form action="/p" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <h2>Add New Post</h1>
            </div>
            <div class="row">
                <label for="caption" class="col-md-4 col-form-label font-weight-bold">{{ __('Caption') }}</label>

                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label font-weight-bold">{{ __('Image Caption') }}</label>

                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row pt-4">
                <button class="btn btn-primary" type="submit">Add New Post</button>
            </div>
        </form>
    </div>
</div>
@endsection