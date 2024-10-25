<?php

namespace Zoker\Shop\Traits\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait Sluggable
{
    protected static function bootSluggable(): void
    {
        static::saving(function (self $model) {
            $model->setSluggableAttributes();
        });
    }

    protected function setSluggableAttributes(): void
    {
        foreach ($this->slugs as $slugAttribute => $slugSource) {
            $this->setSlugValue($slugAttribute, $slugSource);
        }
    }

    protected function setSlugValue(string $attribute, string|array $source): void
    {
        if (! $this->{$attribute}) {
            $slug = $this->getSlugValue($source);

            $slug = Str::slug($slug, language: app()->getLocale());

            $this->{$attribute} = $this->getUniqueSlug($attribute, $slug);
        }
    }

    protected function getUniqueSlug(string $attribute, string $slug): string
    {
        $value = $slug;

        $counter = 1;
        while ($this->newSluggableQuery()->where($attribute, $value)->exists()) {
            $value = $slug . '-' . ++$counter;
        }

        return $value;
    }

    protected function newSluggableQuery(): Builder
    {
        $query = $this->newQuery();

        if (method_exists($this, 'bootSoftDeletes')) {
            $query->withTrashed();
        }

        $query->where($this->getKeyName(), '!=', $this->getKey());

        return $query;
    }

    public function getSlugValue(array|string $source): string
    {
        if (is_string($source)) {
            $source = [$source];
        }

        $attributes = [];
        foreach ($source as $attribute) {
            $attributes[] = $this->getAttribute($attribute);
        }

        return implode(' ', $attributes);
    }
}
