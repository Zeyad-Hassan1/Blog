@php
    use App\Models\Post;

    $posts = new Post();

    $posts = $posts->get();
@endphp
@extends('blog.layout')
@section('content')
    <div class="container mt-4">
        <div class="row">

            @foreach ($posts as $item)
            <div class="col-lg-4 col-12 mb-3">
                <a href="{{url('/post')}}/{{$item->id}}">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('images')}}/{{$item->image}}" class="w-100">
                            <h3>{{$item->title}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            

        </div>
    </div>
@endsection