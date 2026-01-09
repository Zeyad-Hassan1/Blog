@php
    use App\Models\Category;

    $categories = new Category();
    $categories = $categories->get();
@endphp
@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h3>Categories</h3>

        <form action="{{url('/create_catagory')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name :</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button class="btn btn-primary">Create</button>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->userData->name}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="{{url('/del_category')}}/{{$item->id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection