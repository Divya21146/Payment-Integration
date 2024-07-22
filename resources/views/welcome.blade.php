@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('pay') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
