@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Complete</div>

                <div class="card-body">
                    @if ($response['status'] === 'success')
                        <h3>Payment Successful!</h3>
                        <p>Transaction ID: {{ $response['txnid'] }}</p>
                        <p>Amount: {{ $response['amount'] }}</p>
                    @else
                        <h3>Payment Failed!</h3>
                        <p>{{ $response['error_message'] }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
