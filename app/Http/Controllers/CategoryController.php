<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
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

        Category::create([
            'name' => $request->name,
            'photo' => $photo_name,
        ]);


        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

        $category = Category::find($id);
        $category->name = $request->name;
        $category->photo = $photo_name;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index');
    }


    public function search(Request $request){
        $find = $request->search_term;
        $categories = Category::where('name','LIKE',"%$find%")
                ->paginate(5)
                ->appends(['search_term' => $find]);

        return view('category.index',compact('categories'));
    }
}
