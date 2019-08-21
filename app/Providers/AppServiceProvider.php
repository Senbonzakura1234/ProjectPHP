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
        $lsCategory = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
        $lsTag = Tag::withCount('posts')->orderBy('posts_count', 'desc')->get();
        $lsMessage = Message::all();
        View::share('lsCategory',$lsCategory);
        View::share('lsTag',$lsTag);
        View::share('lsMessage',$lsMessage);
        View::share('lsPopular',$lsPopular);
        View::share('lsPopularDlc',$lsPopularDlc);
        View::share('lsDiscount',$lsDiscount);
        View::share('lsLatest',$lsLatest);
        View::share('lsRandomCate',$lsRandomCate);
        View::share('lsRandomTag',$lsRandomTag);
    }
}
