<?php

namespace App\Providers;

use App\Country;
use App\Dlc;
use App\User;
use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\View;
use App\Tag;
use App\Category;
use App\Post;
use App\Message;
use App\Cart;
use App\ProductInvoice;
use Session;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $lsRandomCate = Category::all()->random(2);
        $lsRandomTag = Tag::all()->random(2);
        $lsPopular = Post::withCount('comment')->orderBy('comment_count', 'desc')->take(3)->get();
        $lsPopularDlc = Dlc::withCount('comment')->orderBy('comment_count', 'desc')->take(3)->get();
        $lsDiscount = Post::withCount('comment')->orderBy('comment_count', 'desc')->where('discount', '>', 0)
	        ->take(3)->get();
        $lsLatest = Dlc::orderBy('created_at','desc')->take(3)->get();
        Schema::defaultStringLength(191);
        $lsCategory = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(6)->get();
	    $lsCateName = $lsCategory->pluck('name');
	    $lsCatePostCount = [];
	    $lsCatePostCommentCount = [];
	    foreach ($lsCategory as $cate){
		    $lsCatePostCount[] = $cate->posts->count();
		    $commentCount = 0;
		    foreach($cate->posts as $countEach){
			    $commentCount = $commentCount + count($countEach->comment->where('status',1));
		    }
		    $lsCatePostCommentCount[] = $commentCount;
	    }

        $lsTag = Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(6)->get();
	    $lsTagName = $lsTag->pluck('name');
	    $lsTagPostCount = [];
	    $lsTagPostCommentCount = [];
	    foreach ($lsTag as $tag){
		    $lsTagPostCount[] = $tag->posts->count();
		    $commentCount = 0;
		    foreach($tag->posts as $countEach){
			    $commentCount = $commentCount + count($countEach->comment->where('status',1));
		    }
		    $lsTagPostCommentCount[] = $commentCount;
	    }

        $lsMessage = Message::all();

        // $user = auth()->user();
        // dd($user);
        // $user = auth()->user();
        // dd($user);
        // $id = $user -> id;
        // $lsBought = DB::table('product_invoices')->where('user_id',$id)->get();

        // dd($lsBought);


        View::share('lsCategory',$lsCategory);
        View::share('lsTag',$lsTag);
        View::share('lsMessage',$lsMessage);
        View::share('lsPopular',$lsPopular);
        View::share('lsPopularDlc',$lsPopularDlc);
        View::share('lsDiscount',$lsDiscount);
        View::share('lsLatest',$lsLatest);
        View::share('lsRandomCate',$lsRandomCate);
        View::share('lsRandomTag',$lsRandomTag);
        View::share('lsCateName',$lsCateName);
        View::share('lsCatePostCount',$lsCatePostCount);
        View::share('lsCatePostCommentCount',$lsCatePostCommentCount);
        View::share('lsTagName',$lsTagName);
        View::share('lsTagPostCount',$lsTagPostCount);
        View::share('lsTagPostCommentCount',$lsTagPostCommentCount);


        view()->composer(['layouts.frontend','cart'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        // Kiem tra game, dlc cua user da mua chua:
        view()->composer('*', function ($view){
            if (Auth::check()){
                $lsBought = NULL;
                $lsBought = ProductInvoice::where('user_id', Auth::user()->id)->get();
                $gamedamua = array();
                $dlcdamua = array();
                foreach($lsBought as $bought){
                    array_push($gamedamua, $bought['post_id']);
                    array_push($dlcdamua, $bought['dlc_id']);
                }
                $view->with(['gamedamua'=>$gamedamua, 'dlcdamua'=>$dlcdamua]);
            }
        });

    }
}
