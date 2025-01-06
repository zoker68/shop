<?php

namespace Zoker\Shop\View\Components\Partials;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Meta extends Component
{
    public static string $title;

    public static ?string $description = null;

    public static string $indexing = 'index';

    public static string $follow = 'follow';

    public function __construct()
    {
        self::$title ??= config('app.name', 'ZoKeR Shop');
    }

    public static function setModel(Model $model): void
    {
        $model->loadMissing('seo');
        if ($model->seo?->title) {
            self::setTitle($model);
        }

        if ($model->seo?->description) {
            self::setDescription($model);
        }

        if ($model->seo?->indexing) {
            self::setIndexing($model);
        }

        if ($model->seo?->follow) {
            self::setFollow($model);
        }
    }

    public static function setTitle(Model $model): void
    {
        self::$title = $model->seo->title;
    }

    public static function setDescription(Model $model): void
    {
        self::$description = $model->seo->description;
    }

    public static function setIndexing(Model $model): void
    {
        self::$indexing = $model->seo->indexing;
    }

    public static function setFollow(Model $model): void
    {
        self::$follow = $model->seo->follow;
    }

    public function render(): ?View
    {

        return view('shop::components.partials.meta')->with([
            'title' => self::$title,
            'description' => self::$description,
            'indexing' => self::$indexing,
            'follow' => self::$follow,
        ]);
    }
}
