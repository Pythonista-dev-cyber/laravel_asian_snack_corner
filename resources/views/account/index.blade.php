@extends('layouts.frontend-master')

@section('contents')
<div class="container mt-5">
    <h2>My Account</h2>
    <hr>

    <h4>User Information</h4>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <h4 class="mt-4">My Orders</h4>
    @if($orders->count() > 0)
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Order Number</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Order items</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->order_items }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have no orders yet.</p>
    @endif
</div>
@endsection
