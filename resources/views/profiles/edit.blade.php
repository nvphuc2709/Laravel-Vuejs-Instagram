@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">

            @csrf
            @METHOD("PATCH")

            <div class="row">
                <h2>Edit Profile</h1>
            </div>
            <div class="row">
                <label for="title" class="col-md-4 col-form-label font-weight-bold">{{ __('Title') }}</label>

                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <label for="description" class="col-md-4 col-form-label font-weight-bold">{{ __('Description') }}</label>

                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <label for="url" class="col-md-4 col-form-label font-weight-bold">{{ __('Url') }}</label>

                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url}}" autocomplete="url" autofocus>

                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label font-weight-bold">{{ __('Profile Image') }}</label>

                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row pt-4">
                <button class="btn btn-primary" type="submit">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection