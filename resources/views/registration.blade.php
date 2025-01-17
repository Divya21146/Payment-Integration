@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif
            @if(session()->has("error"))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if(session()->has("success"))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px;">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone No</label>
                <input name="phone" type="tel" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="my-3">
                Already registered? <a href="{{route('login')}}">back to login</a>
            </div>
        </form>
    </div>

@endsection