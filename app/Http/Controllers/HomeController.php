<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Dlc;
use App\Message;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	    $postWindowsCount = count(Post::where('windows', 1)->get());
	    $postXBoxCount = count(Post::where('xbox', 1)->get());
	    $postPlayStationCount = count(Post::where('playstation', 1)->get());
		$platformGameCountArray = [$postWindowsCount, $postXBoxCount, $postPlayStationCount];

	    $dlcWindowsCount = count(Dlc::where('windows', 1)->get());
	    $dlcXBoxCount = count(Dlc::where('xbox', 1)->get());
	    $dlcPlayStationCount = count(Dlc::where('playstation', 1)->get());
		$platformDLCCountArray = [$dlcWindowsCount, $dlcXBoxCount, $dlcPlayStationCount];



		$reviewPostArray = [count(Comment::where('rating', 5)->where('dlc_id', null)->get()),
			count(Comment::where('rating', 4)->where('dlc_id', null)->get()),
			count(Comment::where('rating', 3)->where('dlc_id', null)->get()),
			count(Comment::where('rating', 2)->where('dlc_id', null)->get()),
			count(Comment::where('rating', 1)->where('dlc_id', null)->get())];
		$reviewDlcArray = [count(Comment::where('rating', 5)->where('post_id', null)->get()),
			count(Comment::where('rating', 4)->where('post_id', null)->get()),
			count(Comment::where('rating', 3)->where('post_id', null)->get()),
			count(Comment::where('rating', 2)->where('post_id', null)->get()),
			count(Comment::where('rating', 1)->where('post_id', null)->get())];
        return view('home')->with(['platformGameCountArray' => $platformGameCountArray,
	        'platformDLCCountArray' => $platformDLCCountArray, 'reviewPostArray' => $reviewPostArray,
	        'reviewDlcArray' => $reviewDlcArray]);
    }
}
