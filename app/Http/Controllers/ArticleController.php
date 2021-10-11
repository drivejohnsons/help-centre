<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    /**
     * Show an individual article.
     *
     * @param  Article  $article
     * @return View
     */
    public function show(Article $article): View
    {
        $article->load('tags');

        return view('articles.show', compact('article'));
    }
}
