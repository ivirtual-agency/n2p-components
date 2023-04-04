<?php

namespace iVirtual\Net2phone\Models\Concerns;

use \Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Sluggable\HasSlug;
use Artesaos\SEOTools\Facades\SEOTools;
use Spatie\Sluggable\SlugOptions;

trait HasSeo
{
    use HasSlug;

    /**
     * Get the seo title with a default value.
     */
    protected function seoTitle(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? $this->name
        );
    }

    /**
     * Get the seo description with a default value.
     */
    protected function seoDescription(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? $this->short_description
        );
    }

    /**
     * Set SEO for the model.
     */
    public function withSEO(): self
    {
        SEOTools::setTitle($this->seo_title);
        SEOTools::setDescription($this->seo_description);

        return $this;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
