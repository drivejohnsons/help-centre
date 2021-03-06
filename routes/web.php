<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SitemapController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

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
    return view('home', [
        'latest' => Article::query()
            ->withTags()
            ->published()
            ->latest()
            ->limit(3)
            ->get()
    ]);
});

Route::get('/sitemap', [SitemapController::class, 'index']);

Route::get('/search', function () {
    $articles = Article::search(request('query'))
        ->query(function ($builder) {
            $builder->with('tags');
        })
        ->paginate(10);

    $term = e(request('query'));
    $title = "Search results for '$term'";

    if(request()->wantsJson()) {
        return $articles;
    }

    return view('search', compact('articles', 'term', 'title'));
});

Route::get('/instructors', function () {
    return view('instructors.index', [
        'articles' => Article::query()
            ->instructors()
            ->published()
            ->latest()
            ->withTags()
            ->paginate(12),
    ]);
});

Route::get('/learners', function () {
    return view('learners.index', [
        'articles' => Article::query()
            ->learners()
            ->published()
            ->latest()
            ->withTags()
            ->paginate(12),
    ]);
});

Route::get('/tags/{tag}', function (Tag $tag) {
    return view('tags.show', [
        'tag' => $tag,
        'articles' => $tag->articles()
            ->published()
            ->latest()
            ->withTags()
            ->paginate(12),
    ]);
});

Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show');
