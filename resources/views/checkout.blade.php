
@extends('layouts.frontend-master')
@section('contents')
    <!-- Checkout Start -->
<form action="{{ route('orders.store') }}" method="post">
    @csrf
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input name="fullname" class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="phone" class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Shipping Address</label>
                            <input name="shipping_address" class="form-control" type="text" placeholder="123 Street">
                        </div>
                    </div>
                </div>
                @php
                    $grandtotal = 0;
                    $order_items = "";
                @endphp
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <h6 class="mb-3">Products</h6>
                    @if(session('cart'))
                        @foreach (session('cart') as $id => $details)
                                @php
                                    $grandtotal = $grandtotal + $details['price'] * $details['qty'];
                                    $order_items .= $details['name'] ."/".'price-> $'.$details['price']."/"."Quantity->".$details['qty']."/"."total-> $".($details['price'] * $details['qty'])."#"
                                @endphp
                                <div class="border-bottom">

                                        <div class="d-flex justify-content-between">
                                        <p>{{ $details['name'] }} x {{ $details['qty'] }}</p>
                                        <p>$ {{ $details['qty'] * $details['price'] }}</p>
                                        </div>
                                </div>
                        @endforeach
                    @else
                        <h1>Cart is empty!</h1>
                    @endif
                    @php
                        $grandtotal = $grandtotal + 10;
                    @endphp
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$ {{$grandtotal  }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$ {{ $grandtotal  }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="kpay" name="payment_method" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="wavepay" name="payment_method" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="banktransfer" name="payment_method" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <input type="hidden" name="order_items" value="{{ $order_items }}">
                        <input type="hidden" name="total" value="{{ $grandtotal }}">
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>


                    </div>
                </div>
            </div>
        </div>
    </div>
 </form>
    <!-- Checkout End -->

@endsection
