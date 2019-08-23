<?php

namespace App\Http\Controllers;

use App\Dlc;
use App\Post;
use Illuminate\Http\Request;

class DlcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $ls_dlc = Dlc::orderBy('created_at','asc')->paginate(6);
	    return view("dlc.list")->with(['ls_dlc' => $ls_dlc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $lsPost = Post::all();
	    return view("dlc.create")->with(['lsPost' => $lsPost]);
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
			    'cover' => 'image|mimes:jpeg,png,gif,jpg,svg',
			    'title'  => 'required|max:255|min:3',
			    'content' => 'required|max:20000|min:9',
			    'price' => 'required|numeric|min:0',
			    'discount' => 'required|numeric|max:100|min:0',
			    'windows' => 'required',
			    'xbox' => 'required',
			    'playstation' => 'required',
		    ]
	    );
	    $cover = $request->cover;
	    $image_name = time() . "_" . $cover->getClientOriginalName();
	    if ($cover->isValid()) {
		    $cover->move('images', $image_name);
	    }
	    $path = "images/" . $image_name;

	    $user = auth()->user();

	    $dlc = new Dlc();
	    $dlc->title = $request->title;
	    $dlc->cover = $path;
	    $dlc->price = $request->price;
	    $dlc->discount = $request->discount;
	    $dlc->user_id = $user->id;
	    $dlc->content = $request->content;
	    $dlc->post_id = $request->post;
	    $dlc->windows = $request->windows;
	    $dlc->xbox = $request->xbox;
	    $dlc->playstation = $request->playstation;
	    $dlc->save();
	    return redirect()->route("dlc.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dlc = Dlc::find($id);
	    $lsPost = Post::all();
	    return view("dlc.update")->with(['lsPost' => $lsPost, 'dlc' => $dlc]);
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
			    'cover' => 'image|mimes:jpeg,png,gif,jpg,svg',
			    'title'  => 'required|max:255|min:3',
			    'content' => 'required|max:20000|min:9',
			    'price' => 'required|numeric|min:0',
			    'discount' => 'required|numeric|max:100|min:0',
			    'windows' => 'required',
			    'xbox' => 'required',
			    'playstation' => 'required',
		    ]
	    );
	    $cover = $request->cover;


	    $user = auth()->user();

	    $dlc = Dlc::find($id);
	    $dlc->title = $request->title;
	    if($cover != null){
		    $image_name = time() . "_" . $cover->getClientOriginalName();
		    if ($cover->isValid()) {
			    $cover->move('images', $image_name);
		    }
		    $path = "images/" . $image_name;
		    $dlc->cover = $path;
	    }
	    $dlc->price = $request->price;
	    $dlc->discount = $request->discount;
	    $dlc->user_id = $user->id;
	    $dlc->content = $request->content;
	    $dlc->post_id = $request->post;
	    $dlc->windows = $request->windows;
	    $dlc->xbox = $request->xbox;
	    $dlc->playstation = $request->playstation;
	    $dlc->save();
	    return redirect()->route("dlc.index");
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
	    $dlc = Dlc::find($id);
	    $dlc->delete();
	    $request->session()->flash('success', 'DLC was deleted.');
	    return redirect()->route("post.index");
    }
}
