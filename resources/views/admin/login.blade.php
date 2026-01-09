@php
    use App\Models\User;

    $users = new User();
    $users = $users->get();
@endphp
@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h3>Login</h3>

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
        

        <form action="{{url('/login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Email :</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="">Password :</label>
                <input type="text" class="form-control" name="password">
            </div>
            <button class="btn btn-primary">Login</button>
        </form>

    </div>
@endsection