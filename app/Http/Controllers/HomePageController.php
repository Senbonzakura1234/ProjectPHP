<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        $lsPost = Post::orderBy('created_at','desc')->paginate(8);
        $lsPost->fragment('page-target')->links();
        return view('welcome')->with(['lsPost' => $lsPost]);
    }
    public function viewPost($id){
        $post = Post::find($id);
        $listComment = $post->comment()->where('status', 1)->orderBy('created_at','desc')->paginate(5);
        $listComment->fragment('comment-target')->links();
        return view("view_post")->with(['post'=>$post])->with(['listComment'=>$listComment]);
    }
    public function categorySingle($id){
        $cate = Category::find($id);
        $lsPostCate = $cate->posts()->paginate(8);
        return view('post_by_category')->with(['lsPostCate' => $lsPostCate,'cate'=>$cate]);
    }
    public function tagSingle($id){
        $tag = Tag::find($id);
        $lsPostTag = $tag->posts()->paginate(8);
        return view('post_by_tag')->with(['lsPostTag' => $lsPostTag,'tag'=>$tag]);
    }
    public function about()
    {
        $lsPost = Post::orderBy('created_at','desc')->take(3)->get();
        return view('about')->with(['lsPost' => $lsPost]);
    }
    public function randomPost()
    {
        $randomPost = Post::all()->random(1)->first()->id;
        return redirect('/view_post/'.$randomPost);
    }
    public function post_list()
    {
        $lsPostAll = Post::orderBy('created_at','desc')->paginate(8);
        return view('post_list')->with(['lsPostAll' => $lsPostAll]);
    }
	public function cart()
	{
		return view('cart');
	}
	public function gift()
	{
		return view('gift');
	}
}
