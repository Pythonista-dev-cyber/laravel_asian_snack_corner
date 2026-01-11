@extends('layouts.frontend-master')

@section('contents')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('welcome') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $total = 0;
                            $grandtotal = 0;

                        @endphp
                        @if (count((array) session()->get('cart')) > 0)
                            @foreach ($cart as $id=>$details)
                                @php
                                    $total = $details['price'] * $details['qty'];
                                    $grandtotal = $grandtotal + $total;
                                @endphp
                                 <tr>
                            <td class="align-middle d-flex align-items-center">
                                <img style="width: 50px; margin-right:10px;" src="{{ asset('images') }}/{{ $details['photo'] }}" alt="" style="width: 50px;"> {{ $details['name'] }}
                            </td>
                            <td class="align-middle"> $ {{ $details['price'] }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                   <div class="input-group-btn">
                                        <a href="{{ route('cart.decrease', $id) }}" class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $details['qty'] }}">
                                    <div class="input-group-btn">
                                        <a href="{{ route('cart.increase', $id) }}" class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                        </a>
                                    </div>

                                </div>
                            </td>
                            <td class="align-middle">{{ $total }}</td>
                            <td class="align-middle">
                                <a href="{{ route('cart.remove',$id) }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-times">
                                    </i></a>
                            </td>
                        </tr>

                            @endforeach
                        @else
                            <h1 style="text-align: center;">No Item in the cart!</h1>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6> ${{ $grandtotal }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ $grandtotal + 10 }}</h5>
                        </div>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection
