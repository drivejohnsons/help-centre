<?php

namespace App\Support;

use App\Models\Article;
use App\Models\Tag;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class HelpCentre
{

    /**
     * Build a standard title to use.
     *
     * @param  string  $title
     * @return string
     */
    public function title(string $title): string
    {
        return $title . ' / ' . config('app.name');
    }

    /**
     * Return the Learner's app icon URL.
     *
     * @param string $ext
     * @return string
     */
    public function learnersIcon(string $ext = 'jpg'): string
    {
        return asset("/images/learners.$ext");
    }

    /**
     * Return the Instructors app icon URL.
     *
     * @param string $ext
     * @return string
     */
    public function instructorsIcon(string $ext = 'jpg'): string
    {
        return asset("/images/instructors.$ext");
    }

    /**
     * Get the Google Tag Manager ID.
     *
     * @return string
     */
    public function gtmId(): string
    {
        return env('GTM_ID', null);
    }

    /**
     * Generate the sitemap of tags and articles.
     *
     * @return Sitemap
     */
    public function generateSitemap(): Sitemap
    {
        $sitemap = Sitemap::create();

        $sitemap->add('/learners')
            ->add('/instructors');

        $tags = Tag::orderBy('label')->get();
        $articles = Article::orderBy('title')->get();

        foreach ($articles as $article) {
            $sitemap->add(
                Url::create($article->url)
                    ->setLastModificationDate($article->updated_at)
                    ->setPriority(0.8)
            );
        }

        foreach ($tags as $tag) {
            $sitemap->add(
                Url::create($tag->url)
                    ->setLastModificationDate($tag->updated_at)
                    ->setPriority(0.6)
            );
        }

        return $sitemap;
    }
}
