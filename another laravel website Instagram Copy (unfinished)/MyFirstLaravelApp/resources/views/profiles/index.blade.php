@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="/img/Profile.JPG" style="height:200px" class="rounded-circle">
        </div> 
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user -> username}}</h1>
                <a href="/post/create"><strong>Add New Post</strong></a>
            </div>
            <a href="/profile/{{$user->id}}/edit"> Edit Profile</a>
            <div class="d-flex pt-4">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>20k</strong> followers</div>
                <div class="pr-5"><strong>500</strong> following</div>
            </div>
            <div class="pt-4"><strong>{{$user->firstName}} {{$user->lastName}}</strong></div>
            <div>{{$user->description}}</div>
            <div><a href="{{$user->url}}">{{$user->url}}</a></div>
        </div> 
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{$post->id}}">
                    <img src="/storage/{{$post->image}}"class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
