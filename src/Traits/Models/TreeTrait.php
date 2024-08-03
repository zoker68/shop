<?php

namespace Zoker68\Shop\Traits\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Zoker68\Shop\Models\Category;

/**
 * IF Model have getAllCached() method, use it for get all categories from cache
 **/
trait TreeTrait
{
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function isRoot(): bool
    {
        return $this->parent_id === 0;
    }

    public function getChildren(): ?Collection
    {
        if (method_exists($this, 'getAllCached')) {
            return $this->getAllCached()->where('parent_id', $this->id);
        } else {
            return $this->children;
        }
    }

    public function getAllChildren(): ?Collection
    {
        $children = $this->getChildren();

        if ($children) {
            foreach ($children as $child) {
                $childChildren = $child->getAllChildren();
                if ($childChildren) {
                    $children = $children->merge($childChildren);
                }
            }
        }

        return $children;
    }

    public function getAllChildrenAndSelf()
    {
        return $this->getAllChildren()->push($this);
    }

    public function hasChildren(): bool
    {
        return $this->getChildren()->isNotEmpty();
    }

    public static function getRootChildren(): Collection
    {
        if (method_exists(static::class, 'getAllCached')) {
            return static::getAllCached()->where('parent_id', 1);
        } else {
            return static::where('parent_id', 1)->get();
        }
    }
}
