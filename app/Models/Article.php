<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;
use Laravel\Scout\Searchable;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;

class Article extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'hc_articles';

    protected $connection = 'wolf';

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'url',
    ];

    /**
     * Get the route key name of the model for eager-loading.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Return the full URL of the article.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('articles.show', $this->slug);
    }

    /**
     * Add a scope to query only published articles.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->whereIn('status', ['published'])
                ->where('published_at', '<=', now()->format('Y-m-d H:i:s'));
    }

    /**
     * The tags which are associated with this article.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'hc_article_tag');
    }

    /**
     * Determine if the article has a video attached to it.
     *
     * @return bool
     */
    public function hasVideo(): bool
    {
        return ! empty($this->video_url);
    }

    /**
     * Return the key for the cache storage.
     *
     * @return string
     */
    protected function getCacheKey(): string
    {
        return "article.$this->id";
    }

    /**
     * Parse the markdown content.
     *
     * @return HtmlString
     */
    public function formatContent(): HtmlString
    {
        $environment = new Environment([
            //
        ]);

        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        $converter = new MarkdownConverter($environment);

        return new HtmlString(
            $converter->convertToHtml($this->content)
        );
    }

    /**
     * Determine if the article has content.
     *
     * @return bool
     */
    public function hasContent(): bool
    {
        return ! empty($this->content);
    }

    /**
     * Return the formatted markdown content.
     *
     * @return string|null
     */
    public function getMarkdownContentAttribute(): string
    {
        return $this->formatContent()->toHtml();
    }

    /**
     * Determine if the article has loaded tags.
     *
     * @return bool
     */
    public function hasLoadedTags(): bool
    {
        if(! $this->relationLoaded('tags')) {
            return false;
        }

        return !! $this->tags->count();
    }

    /**
     * Scope articles which belong to the learners tag.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeLearners(Builder $query): Builder
    {
        return $query->whereHas('tags', function ($query) {
            $query->where('id', 2);
        });
    }

    /**
     * Scope articles which belong to the instructors tag.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeInstructors(Builder $query): Builder
    {
        return $query->whereHas('tags', function ($query) {
            $query->where('id', 1);
        });
    }

    /**
     * Add a scope to return 3 tags with the article.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeWithTags(Builder $query): Builder
    {
        return $query->with([
            'tags' => function ($query) {
                $query->limit(3);
            }
        ]);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->only([
            'title',
            'content',
            'excerpt',
        ]);

        if(! $this->relationLoaded('tags')) {
            $this->load('tags');
        }

        $array['tags'] = $this->tags;

        return $array;
    }

    /**
     * Determine if the article is currently published.
     *
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->status == 'published' && $this->published_at->lte(now());
    }

    /**
     * Determine if the model should be searchable.
     *
     * @return bool
     */
    public function shouldBeSearchable(): bool
    {
        return $this->isPublished();
    }

    /**
     * Modify the query used to retrieve models when making all the models searchable.
     *
     * @param Builder $query
     * @return Builder
     */
    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with([
            'tags' => function ($query) {
                $query->limit(3);
            }
        ]);
    }
}
