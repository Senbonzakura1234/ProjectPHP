<?php

namespace App\Providers;

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
        $adminUser = User::orderBy('created_at','asc')->take(1)->get();
        $lsRandomCate = Category::all()->random(2);
        $lsRandomTag = Tag::all()->random(2);
        $lsPopular = Post::withCount('comment')->orderBy('comment_count', 'desc')->take(3)->get();
        $lsLatest = Post::orderBy('created_at','desc')->take(3)->get();
        Schema::defaultStringLength(191);
        $lsCategory = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
        $lsTag = Tag::withCount('posts')->orderBy('posts_count', 'desc')->get();
        $lsMessage = Message::all();
        View::share('lsCategory',$lsCategory);
        View::share('lsTag',$lsTag);
        View::share('lsMessage',$lsMessage);
        View::share('lsPopular',$lsPopular);
        View::share('lsLatest',$lsLatest);
        View::share('lsRandomCate',$lsRandomCate);
        View::share('lsRandomTag',$lsRandomTag);
        View::share('adminUser',$adminUser);
    }
}
