<?php

namespace App\Http\Controllers;

use App\Dlc;
use App\Gallery;
use App\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $lsPost = Post::orderBy('title','asc')->get();
	    $lsDlc = Dlc::orderBy('title','asc')->get();
	    return view("gallery.create")->with(['lsPost' => $lsPost, 'lsDlc' => $lsDlc]);
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
			    'type'  => 'required',
		    ]
	    );

	    $images=array();
	    if($request->post != null && $request->type == 1){
		    if($files=$request->file('gallery')){
			    foreach($files as $file){
				    $name= time()."_".$file->getClientOriginalName();
				    $file->move('images/gallery',$name);
				    $images[]=$name;
				    $link = "images/gallery/" . $name;
				    $gallery = new Gallery();
				    $gallery->link = $link;
				    $gallery->post_id = $request->post;
				    $gallery -> save();
			    }
			    return redirect()->route("galleryGame", ['id' => $request->post]);
		    }else{
			    return redirect()->route("gallery.create");
		    }
	    }elseif ($request->dlc != null && $request->type == 2){
		    if($files=$request->file('gallery')){
			    foreach($files as $file){
				    $name= time()."_".$file->getClientOriginalName();
				    $file->move('images/gallery',$name);
				    $images[]=$name;
				    $link = "images/gallery/" . $name;
				    $gallery = new Gallery();
					$gallery->link = $link;
				    $gallery->dlc_id = $request->dlc;
				    $gallery -> save();
			    }
			    return redirect()->route("galleryDlc", ['id' => $request->post]);
		    }else{
			    return redirect()->route("gallery.create");
		    }
	    }else{
		    return redirect()->route("gallery.create");
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showGame($id)
    {
	    $post = Post::find($id);
	    return view("gallery.viewGame")->with(['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDlc($id)
    {
	    $dlc = Dlc::find($id);
	    return view("gallery.viewDlc")->with(['dlc' => $dlc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
