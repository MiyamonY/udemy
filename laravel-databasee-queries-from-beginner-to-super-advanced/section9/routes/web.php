<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

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


    $latest_post = Post::select('id', 'title')->latest()->take(5)->withCount('comments')->get();

    dump($latest_post);

    return view('welcome');
});
