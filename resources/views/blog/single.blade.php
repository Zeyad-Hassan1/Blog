@php
    use App\Models\Post;

    $posts = new Post();

    $posts = $posts->find($id);
@endphp
@extends('blog.layout')
@section('content')
    <div class="container mt-4">
        <div class="row">

            @if($posts)
                <h1>{{$posts->title}}</h1>
                <img src="{{asset('images')}}/{{$posts->image}}" class="w-25">
                <p>{{$posts->userData->name}} / {{$posts->created_at}}</p>
                <p>{{$posts->content}}</p>
            @endif
        </div>
    </div>
@endsection