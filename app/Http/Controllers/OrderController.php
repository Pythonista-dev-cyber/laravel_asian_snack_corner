<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order_id = "#".rand(10000,99999);
        $order_date = date('d-m-y');


        $order = Order::create([
            'order_id' => $order_id,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
            'order_items' => $request->order_items,
            'total' => $request->total,
            'order_status' => 'Pending',
            'order_date' => $order_date,
        ]);

        $carts = session()->get('cart');
        session()->forget('cart');
        return view('ordersuccess',compact('carts','order'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
