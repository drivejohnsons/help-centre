<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $connection = 'wolf';

    protected $table = 'hc_tags';

    protected $appends = [
        'url',
    ];

    /**
     * Get the tag's route key name.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * The articles which are associated with this tag.
     *
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'hc_article_tag');
    }

    /**
     * Get the url for the tag.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return secure_url("/tags/$this->slug");
    }
}
