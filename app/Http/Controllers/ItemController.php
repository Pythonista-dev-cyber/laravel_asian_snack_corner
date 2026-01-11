<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $items = Item::paginate(5);
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo_store = $request->create_photo;
        $photo_name = "";
        if($photo_store){
            $photo_name = $photo_store->getClientOriginalName();
            $photo_store->move(public_path('images'),$photo_name);
        }

        Item::create([
            'category' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $photo_name,
        ]);


        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('items.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $photo_edit = $request->edit_photo;
        $photo_name = "";
        if($photo_edit){
            $photo_name = $photo_edit->getClientOriginalName();
            $photo_edit->move(public_path('images'),$photo_name);
        }
        else{
            $photo_name = $request->curr_photo;
        }

        $item = Item::find($id);
        $item->category = $request->category;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->photo = $photo_name;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $item = Item::find($id);
       $item->delete();
       return redirect()->route('items.index');
    }

    public function search(Request $request){
        $find = $request->search_term;
        $items = Item::where('category','LIKE',"%$find%")
                ->orwhere('name','LIKE',"%$find%")
                ->paginate(5)
                ->appends(['search_term' => $find]);

        return view('welcome',compact('items'));
    }
}
