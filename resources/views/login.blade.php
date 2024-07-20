@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="container">
        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px;">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection