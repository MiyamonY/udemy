<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $categories = Category::select('id', 'title')->orderBy('title')->get();

    // dump($categories);
    // $tags = Tag::select('id', 'name')->orderByDesc('name')->get();

    // $tags = Tag::select('id', 'name')->orderByDesc(
    //     DB::table('post_tag')->selectRaw('count(tag_id) as tag_count')
    //                          ->whereColumn('tags.id', 'post_tag.tag_id')
    //                          ->orderBy('tag_count', 'desc')
    //                          ->limit(1)
    // )->get();

    // dump($tags);


    // $latest_post = Post::select('id', 'title')->latest()->take(5)->withCount('comments')->get();

    // $most_popular_post = Post::select('id', 'title')->orderByDesc(
    //     Comment::selectRaw('count(post_id) as comment_count')
    //     ->whereColumn('posts.id', 'comments.post_id')
    //     ->orderBy('comment_count', 'desc')
    //     ->limit(1)
    // )->withCount('comments')->take(5)->get();


    // $most_active_users = User::select('id', 'name')->orderByDesc(
    //     Post::selectRaw('count(user_id) as post_count')
    //     ->whereColumn('users.id', 'posts.user_id')
    //     ->orderBy('post_count', 'desc')
    //     ->limit(1)
    // )->withCount('posts')->take(3)->get();


    $most_popular_category = Category::select('id', 'title')->withCount('comments')->orderBy('comments_count','desc')->take(1)->get();

    dump($most_popular_category);

    return view('welcome');
});
