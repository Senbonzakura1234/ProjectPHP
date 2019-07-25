<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ls_tag = Tag::all();
        $ls_message = Message::all();
        return view("tag.list")->with(['lsTag'=>$ls_tag])->with(['lsMessage'=>$ls_message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ls_message = Message::all();
        return view("tag.create")->with(['lsMessage'=>$ls_message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $new_tag = new Tag();
        $new_tag->name = $name;
        $new_tag->save();
        return redirect()->route("tag.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $ls_message = Message::all();
        return view("tag.view")->with(["tag"=>$tag])->with(['lsMessage'=>$ls_message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $ls_message = Message::all();
        return view("tag.update")->with(["tag"=>$tag])->with(['lsMessage'=>$ls_message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        $new_tag = Tag::find($id);
        $new_tag->name = $name;
        $new_tag->save();
        return redirect()->route("tag.index");
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
        $tag = Tag::find($id);
        $tag->delete();
        $request->session()->flash('success', 'Tag was deleted.');
        return redirect()->route("tag.index");
    }
}
