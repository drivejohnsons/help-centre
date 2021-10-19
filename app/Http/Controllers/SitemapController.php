<?php

namespace App\Http\Controllers;

use App\Support\Facades\HelpCentreFacade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $request)
    {
        $sitemap = Cache::remember('sitemap', now()->addHours(6), function () {
            return HelpCentreFacade::generateSitemap();
        });

        return $sitemap->toResponse($request);
    }
}
