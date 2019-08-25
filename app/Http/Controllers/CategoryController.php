<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ls_category = Category::orderBy('name','asc')->paginate(9);
//        dd($ls_category);
        return view("category.list")->with(['lsCate' => $ls_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255|min:3'
            ]
        );
        $name = $request->input("name");
        $new_category = new Category();
        $new_category->name = $name;
        $new_category->save();

        return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ls_message = Message::all();
        $category = Category::find($id);
        return view("category.view")->with(["cate" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view("category.update")->with(["cate" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255|min:3'
            ]
        );
        $name = $request->input("name");
        $new_category = Category::find($id);
        $new_category->name = $name;
        $new_category->save();
        return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        $request->session()->flash('success', 'Category was deleted.');
        return redirect()->route("category.index");
    }
}
