<?php

namespace iVirtual\Net2phone\Models;

use App\Models\User;
use iVirtual\Net2phone\Models\Concerns\HasSeo;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasSeo, SoftDeletes;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['publish_at' => 'datetime'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['createdBy'];

    /**
     * Bootstrap the model and its traits.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (BlogPost $blogPost) {
            if (empty($blogPost->created_by_user_id) && auth()->user()) {
                // Set which user created the blog post.
                $blogPost->createdBy()->associate(auth()->user());
            }
        });
    }

    /**
     * Check if post should be hide on website.
     */
    public function shouldHideOnWebsite(): bool
    {
        return is_null($this->publish_at) || now()->isBefore($this->publish_at);
    }

    /**
     * Which user created the post.
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    /**
     * Category of the post.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    /**
     * Tags of the post.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag');
    }

    /**
     * Scope the posts query for the website.
     */
    public function scopeForWebsite(Builder $query): Builder
    {
        return $query
            ->whereNotNull('publish_at')
            ->whereDate('publish_at', '<=', now())
            ->orderBy('publish_at', 'desc');
    }

    /**
     * Get a new query for related posts.
     */
    public function relatedPosts(): Builder
    {
        return $this->query()
            ->where('id', '!=', $this->id)
            ->whereHas(
                'category',
                fn (Builder $query) => $query->where('id', $this->blog_category_id)
            )
            ->forWebsite();
    }
}
