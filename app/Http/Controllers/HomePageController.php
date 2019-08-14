<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Dlc;
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
        if (Auth::check()){
	        $userID = auth()->user()->id;
	        $lsUserRating = $post->comment()->where('status', 1)->where('user_id', $userID)->get();
	        $lsUserRatingCount = count($lsUserRating);
        }

        $lsRating5 = $post->comment()->where('status', 1)->where('rating', 5)->get();
        $lsRating4 = $post->comment()->where('status', 1)->where('rating', 4)->get();
        $lsRating3 = $post->comment()->where('status', 1)->where('rating', 3)->get();
        $lsRating2 = $post->comment()->where('status', 1)->where('rating', 2)->get();
        $lsRating1 = $post->comment()->where('status', 1)->where('rating', 1)->get();

        $lsRatingTotal = count($post->comment()->where('status', 1)->get());
		if($lsRatingTotal > 0 ){
			$lsRating5Score = count($lsRating5)*100/$lsRatingTotal;
			$lsRating4Score = count($lsRating4)*100/$lsRatingTotal;
			$lsRating3Score = count($lsRating3)*100/$lsRatingTotal;
			$lsRating2Score = count($lsRating2)*100/$lsRatingTotal;
			$lsRating1Score = count($lsRating1)*100/$lsRatingTotal;
		}else{
			$lsRating5Score = 0;
			$lsRating4Score = 0;
			$lsRating3Score = 0;
			$lsRating2Score = 0;
			$lsRating1Score = 0;
		}

        $lsRatingScore = (5*$lsRating5Score + 4*$lsRating4Score +
		        3*$lsRating3Score + 2*$lsRating2Score + $lsRating1Score)/100;

        $listComment = $post->comment()->where('status', 1)->orderBy('created_at','desc')->paginate(10);
        $listComment->fragment('comment-target')->links();
        return view("view_post")->with(['post'=>$post])->with(['listComment'=>$listComment,
	        'lsRating5Score'=>$lsRating5Score, 'lsRating4Score'=>$lsRating4Score,
	        'lsRating3Score'=>$lsRating3Score, 'lsRating2Score'=>$lsRating2Score,
	        'lsRating1Score'=>$lsRating1Score, 'lsRatingTotal'=>$lsRatingTotal,
	        'lsRatingScore'=>$lsRatingScore])
	        ->with('lsUserRatingCount', isset($lsUserRatingCount)?$lsUserRatingCount:null);
    }

	public function viewDlc($id){
		$dlc = Dlc::find($id);
		if (Auth::check()){
			$userID = auth()->user()->id;
			$lsUserRating = $dlc->comment()->where('status', 1)->where('user_id', $userID)->get();
			$lsUserRatingCount = count($lsUserRating);
		}

		$lsRating5 = $dlc->comment()->where('status', 1)->where('rating', 5)->get();
		$lsRating4 = $dlc->comment()->where('status', 1)->where('rating', 4)->get();
		$lsRating3 = $dlc->comment()->where('status', 1)->where('rating', 3)->get();
		$lsRating2 = $dlc->comment()->where('status', 1)->where('rating', 2)->get();
		$lsRating1 = $dlc->comment()->where('status', 1)->where('rating', 1)->get();

		$lsRatingTotal = count($dlc->comment()->where('status', 1)->get());
		if($lsRatingTotal > 0 ){
			$lsRating5Score = count($lsRating5)*100/$lsRatingTotal;
			$lsRating4Score = count($lsRating4)*100/$lsRatingTotal;
			$lsRating3Score = count($lsRating3)*100/$lsRatingTotal;
			$lsRating2Score = count($lsRating2)*100/$lsRatingTotal;
			$lsRating1Score = count($lsRating1)*100/$lsRatingTotal;
		}else{
			$lsRating5Score = 0;
			$lsRating4Score = 0;
			$lsRating3Score = 0;
			$lsRating2Score = 0;
			$lsRating1Score = 0;
		}

		$lsRatingScore = (5*$lsRating5Score + 4*$lsRating4Score +
				3*$lsRating3Score + 2*$lsRating2Score + $lsRating1Score)/100;

		$listComment = $dlc->comment()->where('status', 1)->orderBy('created_at','desc')->paginate(10);
		$listComment->fragment('comment-target')->links();
		return view("view_dlc")->with(['dlc'=>$dlc])->with(['listComment'=>$listComment,
			'lsRating5Score'=>$lsRating5Score, 'lsRating4Score'=>$lsRating4Score,
			'lsRating3Score'=>$lsRating3Score, 'lsRating2Score'=>$lsRating2Score,
			'lsRating1Score'=>$lsRating1Score, 'lsRatingTotal'=>$lsRatingTotal,
			'lsRatingScore'=>$lsRatingScore])
			->with('lsUserRatingCount', isset($lsUserRatingCount)?$lsUserRatingCount:null);
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
        $lsDlc = Dlc::orderBy('created_at','desc')->take(3)->get();
        return view('about')->with(['lsPost' => $lsPost, 'lsDlc' => $lsDlc]);
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
    public function dlc_list()
    {
        $lsDlcAll = Dlc::orderBy('created_at','desc')->paginate(8);
        return view('dlc_list')->with(['lsDlcAll' => $lsDlcAll]);
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
