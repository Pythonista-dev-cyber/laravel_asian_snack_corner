@extends('layouts.frontend-master')
@section('contents')

<!-- Checkout Success Start -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-body text-center p-5">

                    <!-- Success Icon -->
                    <div class="mb-4">
                        <i class="fa fa-check-circle text-success" style="font-size: 60px;"></i>
                    </div>

                    <!-- Thank you message -->
                    <h2 class="mb-3">Thank you for your order!</h2>
                    <p class="text-muted mb-4">Your order <strong>#{{ $order->order_id }}</strong> has been successfully placed on <strong>{{ $order->order_date }}</strong>.</p>

                    <!-- Order summary -->
                    <div class="border rounded p-3 mb-4">
                        <h5 class="mb-3">Order Summary</h5>
                       <div class="border rounded p-3 mb-3">
                        <span>{{ $order->fullname }}</span>
                            @foreach ($carts as $id => $item)
                                <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-white rounded shadow-sm">
                                <div class="font-weight-bold">{{ $item['name'] }}</div>
                                <div class="text-muted">
                                    ${{ $item['price'] }} x {{ $item['qty'] }} = <span class="font-weight-bold">${{ $item['price'] * $item['qty'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>


                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <span>Shipping Address</span>
                            <span>{{ $order->shipping_address }}</span>
                        </div>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <span>Total</span>
                            <span>${{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>

                    <!-- Payment method -->
                    <p class="mb-4">Payment Method: <strong>{{ ucfirst($order->payment_method) }}</strong></p>



                </div>
            </div>

        </div>
    </div>
</div>
<!-- Checkout Success End -->

<!-- Optional CSS -->
<style>
.card-body h2 {
    color: #004cb9;
}
.card-body p {
    font-size: 16px;
}
.btn-primary {
    background-color: #004cb9;
    border-color: #004cb9;
}
.btn-primary:hover {
    background-color: #0033a0;
    border-color: #0033a0;
}
</style>

@endsection
