<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart($id){
       $item = Item::find($id);
       $cart = session()->get('cart',[]);

       if(isset($cart[$id])){
        $cart[$id]['qty']++;
       }
       else{
        $cart[$id] =[
            'category' => $item->category,
            'name' => $item->name,
            'price' => $item->price,
            'photo' => $item->photo,
            'qty' => 1,
        ];
       }

       session()->put('cart',$cart);
       return redirect()->back();
    }

    public function list(){
        $cart = session()->get('cart');
        return view('cart',compact('cart'));
    }

    public function cartincrease($id){
        $cart = session()->get('cart');

        $cart[$id]['qty']++;
        session()->put('cart',$cart);
        return redirect()->back();

    }

    public function cartdecrease($id){
        $cart = session()->get('cart');

        if ($cart[$id]['qty'] <= 1){
            $cart[$id]['qty'] = 1;
        }
        else{
            $cart[$id]['qty']--;
        }

        session()->put('cart',$cart);
        return redirect()->back();


    }

    public function cartremove($id){
        $cart = session()->get('cart');

        if (isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
        }

        return redirect()->back();
    }

    public function checkout(){
        return view('checkout');
    }
}
