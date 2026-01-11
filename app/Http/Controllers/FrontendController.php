<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
class FrontendController extends Controller
{
    public function welcome(){
        $items = Item::paginate(8);
        return view('welcome',compact('items'));
    }

    public function shop(){
        $items = Item::paginate(8);
        return view('shop',compact('items'));
    }

    public function ShopFind(Request $request){
        $query = Item::query();
        if($request->search_term){
            $find = $request->search_term;
            $query->where('category','LIKE',"%$find%")
                ->orWhere('name','LIKE',"%$find%");
        }
        if ($request->price){
            foreach($request->price as $range){
                [$min,$max] = explode('-',$range);
                $query->orWhereBetween('price',[(float)$min,(float)$max]);
            }
        }

        $items = $query->paginate(8)->appends($request->all());
        return view('shop',compact('items'));
    }

    public function detail($id){
        $item = Item::find($id);
        $items = Item::where('category','LIKE',"%$item->category%")->get();

        return view('detail',compact('item','items'));
    }

    public function  addcartdetail(Request $request, $id){
        $item = Item::find($id);
        $cart = session()->get('cart',[]);


        if(isset($cart[$id])){
            $cart[$id]['qty'] += $request->qty;
        }
        else{
            $cart[$id] =[
                'category' => $item->category,
            'name' => $item->name,
            'price' => $item->price,
            'photo' => $item->photo,
            'qty' => $request->qty,
            ];
        }


        session()->put('cart',$cart);
        return redirect()->back();

    }
}
