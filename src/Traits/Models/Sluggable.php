<?php

namespace Zoker68\Shop\Traits\Models;

use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait Sluggable
{
    protected function generateUniqueSlug(): string
    {
        $slug = Str::slug($this->generateFirstSlug());
        $originalSlug = $slug;
        $counter = 1;

        while ($this->slugExists($slug)) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    protected function slugExists($slug): bool
    {
        return self::where('slug', $slug)
            ->when($this->id, fn ($query) => $query->where('id', '!=', $this->id))
            ->exists();
    }

    public function checkSlug(): void
    {
        if (! $this->slug) {
            $this->slug = $this->generateUniqueSlug();
        }

        if ($this->isDirty('slug')) {
            if ($this->slugExists($this->slug)) {
                throw ValidationException::withMessages(['slug' => __('zoker68.shop::trait.model.sluggable.error.slug')]);
            }
        }
    }

    public function generateFirstSlug(): string
    {
        $slug = [];
        if (is_string($this->sluggable)) {
            return $this->{$this->sluggable};
        }

        foreach ($this->sluggable as $attribute) {
            if ($this->{$attribute}) {
                $slug[] = $this->{$attribute};
            }
        }

        return implode('-', $slug);
    }

    public static function bySlug(string $slug): ?self
    {
        return self::where('slug', $slug)->first();
    }

    public static function bySlugOrFail(string $slug): ?self
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
