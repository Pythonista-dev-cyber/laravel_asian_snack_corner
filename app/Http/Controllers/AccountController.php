<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get user's orders by their email
        $orders = Order::where('email', $user->email)
                        ->orderBy('order_date', 'desc')
                        ->get();

        return view('account.index', compact('user', 'orders'));
    }
}
