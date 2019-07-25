<?php

namespace App\Http\Controllers;

use App\PostCategory;
use App\PostTag;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ls_post = Post::orderBy('created_at','asc')->paginate(6);
        return view("post.list")->with(['lsPost' => $ls_post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsCate = Category::all();
        $lsTag = Tag::all();
        return view("post.create")->with(['lsCate' => $lsCate, 'lsTag' => $lsTag]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'cover' => 'image|mimes:jpeg,png,gif,jpg,svg',
                'title'  => 'required|max:255|min:3',
                'content' => 'required|max:20000|min:9',
            ]
        );
        $cover = $request->cover;
        $image_name = time() . "_" . $cover->getClientOriginalName();
        if ($cover->isValid()) {
            $cover->move('images', $image_name);
        }
        $path = "images/" . $image_name;

        $user = auth()->user();
        $post = new Post();
        $post->title = $request->title;
        $post->cover = $path;
        $post->user_id = $user->id;
        $post->content = $request->content;
        $post->save();

        $lsSelectedCate = $request->category;
        $lsSelectedTag = $request->tag;
        if ($lsSelectedCate != null && count($lsSelectedCate) > 0) {
            foreach ($lsSelectedCate as $selectedCate) {
                $post_Category = new PostCategory();
                $post_Category->category_id = $selectedCate;
                $post_Category->post_id = $post->id;
                $post_Category->save();
            }
        }
        if ($lsSelectedTag != null && count($lsSelectedTag) > 0) {
            foreach ($lsSelectedTag as $selectedTag) {
                $post_Tag = new PostTag();
                $post_Tag->tag_id = $selectedTag;
                $post_Tag->post_id = $post->id;
                $post_Tag->save();
            }
        }
        return redirect()->route("post.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view("post.view")->with(["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $lsPostCate = $post->categories;
        $lsPostTag = $post->tags;
        $lsSelectedCateID = [];
        $lsSelectedTagID = [];
        foreach ($lsPostCate as $PostCate){
            $lsSelectedCateID[] = $PostCate->id;
        };
        foreach ($lsPostTag as $PostTag){
            $lsSelectedTagID[] = $PostTag->id;
        };
        $lsCate = Category::all();
        $lsTag = Tag::all();
        return view("post.update")->with(['lsCate' => $lsCate, 'lsTag' => $lsTag,
        'post' => $post, 'lsPostCate' => $lsPostCate, 'lsPostTag' => $lsPostTag,
        'lsSelectedCateID' => $lsSelectedCateID, 'lsSelectedTagID' => $lsSelectedTagID]);
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
                'cover' => 'image|mimes:jpeg,png,gif,jpg,svg',
                'title'  => 'required|max:255|min:3',
                'content' => 'required|max:20000|min:9',
            ]
        );
        $cover = $request->cover;
        $post = Post::find($id);
        if($cover != null){
            $image_name = time() . "_" . $cover->getClientOriginalName();
            if ($cover->isValid()) {
                $cover->move('images', $image_name);
            }
            $path = "images/" . $image_name;
            $post->cover = $path;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $lsSelectedCate = $request->category;
        $lsSelectedTag = $request->tag;
        if ($lsSelectedCate != null && count($lsSelectedCate) > 0) {
            foreach ($lsSelectedCate as $selectedCate) {
                $post_Category = new PostCategory();
                $post_Category->category_id = $selectedCate;
                $post_Category->post_id = $post->id;
                $post_Category->save();
            }
        }
        if ($lsSelectedTag != null && count($lsSelectedTag) > 0) {
            foreach ($lsSelectedTag as $selectedTag) {
                $post_Tag = new PostTag();
                $post_Tag->tag_id = $selectedTag;
                $post_Tag->post_id = $post->id;
                $post_Tag->save();
            }
        }
        return redirect()->route("post.index");
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
        $post = Post::find($id);
        $post->delete();
        $request->session()->flash('success', 'Post was deleted.');
        return redirect()->route("post.index");
    }
}
