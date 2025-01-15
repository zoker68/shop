<?php

namespace Zoker\Shop\Traits\Models;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Classes\Event;
use Zoker\Shop\Models\Seo;

trait HasSeo
{
    public static bool $seoExtendedForm = false;

    public function initializeHasSeo(): void
    {
        static::created(function (Model $model) {
            $model->seo()->create([
                'title' => $this->getPresetTitleFromModel($model) . ' | ' . config('app.name'),
                'description' => $this->getPresetDescriptionFromModel($model),
            ]);
        });

        static::forceDeleted(function (Model $model) {
            $model->seo()->delete();
        });

        $this->extendFormSchema();
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function extendFormSchema(): void
    {
        if (static::$seoExtendedForm) {
            return;
        }

        Event::listen('backend.form.extend', function (BaseResource $resource) {
            if ($resource->getModel() != self::class) {
                return;
            }

            $resource->addFormFields([
                'seo' => Fieldset::make('Seo')
                    ->relationship('seo')
                    ->schema([
                        Group::make([
                            TextInput::make('title')
                                ->label('Seo title')
                                ->live()
                                ->hint(fn ($state) => strlen($state) . ' characters')
                                ->hintColor(fn ($state) => strlen($state) > 60 ? 'danger' : null)
                                ->helperText('Recommended maximum length: 60 characters'),

                            Select::make('indexing')
                                ->label('Allow robots indexing?')
                                ->selectablePlaceholder(false)
                                ->default('index')
                                ->options([
                                    'index' => 'Yes',
                                    'noindex' => 'No',
                                ]),

                            Select::make('follow')
                                ->label('Allow robots to follow links?')
                                ->selectablePlaceholder(false)
                                ->default('follow')
                                ->options([
                                    'follow' => 'Yes',
                                    'nofollow' => 'No',
                                ]),
                        ]),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(8)
                            ->live()
                            ->hint(fn ($state) => strlen($state) . ' characters')
                            ->hintColor(fn ($state) => strlen($state) > 160 ? 'danger' : null)
                            ->helperText('Recommended maximum length: 160 characters'),

                    ]),
            ], 'SEO');
        });

        static::$seoExtendedForm = true;
    }

    public function getPresetTitleFromModel(Model $model): ?string
    {
        if (isset($model->title)) {
            return $model->title;
        }

        if (isset($model->name)) {
            return $model->name;
        }

        return null;
    }

    public function getPresetDescriptionFromModel(Model $model): ?string
    {
        if (isset($model->description)) {
            return $model->description;
        }

        if (isset($model->content)) {
            return $model->content;
        }

        return null;
    }
}
