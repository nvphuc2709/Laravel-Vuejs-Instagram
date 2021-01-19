@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fsgn5-5.fna.fbcdn.net/v/t51.2885-19/s150x150/97566921_2973768799380412_5562195854791540736_n.jpg?_nc_ht=instagram.fsgn5-5.fna.fbcdn.net&amp;_nc_ohc=Uh_JtkD6BI8AX_8QR9q&amp;tp=1&amp;oh=20bc161ffda097f8b7cd2b79634a6880&amp;oe=603027E7" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                @if (auth()->user())
                <a href="/p/create">Add New Post</a>
                @endif
            </div>
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            <div class="d-flex">
                <div class="pr-5">
                    <strong>{{ $user->posts->count() }}</strong> posts
                </div>
                <div class="pr-5"><strong>64k</strong> followers</div>
                <div class="pr-5"><strong>295</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection