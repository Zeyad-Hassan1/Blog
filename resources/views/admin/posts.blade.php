@php
    use App\Models\Category;
    use App\Models\Post;

    $categories = new Category();
    $categories = $categories->get();

    $posts = new Post();
    $posts = $posts->get();
@endphp
@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h3>Posts</h3>

        <form action="{{url('/create_post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Image :</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="">Title :</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="">Category :</label>
                <select name="category" id="" class="form-select">
                    <option value="">Select</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Content :</label>
                <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button class="btn btn-primary">Create</button>
        </form>


        <table class="table" style="height: 3000pxr">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    {{-- <th>Content</th> --}}
                    <th>Category</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>
                            <img src="{{asset('images')}}/{{$item->image}}" style="width:30px;height:30px;object-fit:cover">
                        </td>
                        <td>{{$item->title}}</td>
                        {{-- <td>{{$item->content}}</td> --}}
                        <td>{{$item->categoryData->name}}</td>
                        <td>{{$item->userData->name}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="{{url('/del_post')}}/{{$item->id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection