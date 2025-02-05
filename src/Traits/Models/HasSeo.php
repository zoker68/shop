<?php

namespace Zoker\Shop\Traits\Models;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Zoker\Shop\Classes\AIQuery;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Classes\Event;
use Zoker\Shop\Models\Seo;

trait HasSeo
{
    public static bool $isTraitInitialized = false;

    public function initializeHasSeo(): void
    {
        if (static::$isTraitInitialized) {
            return;
        }

        static::$isTraitInitialized = true;

        static::created(function (Model $model) {
            $model->seo()->create([
                'title' => $this->getPresetTitleFromModel($model) . ' | ' . config('app.name'),
                'description' => $this->getPresetDescriptionFromModel($model),
            ]);
        });

        static::deleting(function (Model $model) {
            if ($model->forceDeleting) {
                $model->seo()->delete();
            }
        });

        $this->extendFormSchema();
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function extendFormSchema(): void
    {
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
                                ->hint(fn ($state) => mb_strlen($state) . ' characters')
                                ->hintColor(fn ($state) => mb_strlen($state) > 60 ? 'danger' : null)
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

                        Group::make([

                            Textarea::make('description')
                                ->label('Description')
                                ->rows(6)
                                ->live()
                                ->hint(fn ($state) => mb_strlen($state) . ' characters')
                                ->hintColor(fn ($state) => mb_strlen($state) > 160 ? 'danger' : null)
                                ->helperText('Recommended maximum length: 160 characters'),

                            Placeholder::make('generateAI')
                                ->label('Generate SEO with AI')
                                ->key('generateAI')
                                ->hintAction(
                                    Action::make('generate_ai')
                                        ->label('Generate SEO')
                                        ->action(function (Set $set, Get $get) use ($resource) {
                                            $parentModelArray = $get('../');
                                            $parentModelArray = $this->handleModelDataForAI($parentModelArray, $resource);
                                            $result = (array) json_decode(AIQuery::seoTitleDescription($parentModelArray));

                                            $set('title', $result['title'] . ' | ' . config('app.name'));
                                            $set('description', $result['description']);
                                        }),
                                ),

                        ]),
                    ]),
            ], 'SEO');
        });
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

    public function handleModelDataForAI(mixed $parentModelArray, BaseResource $resource): mixed
    {
        unset(
            $parentModelArray['seo'],
            $parentModelArray['id'],
            $parentModelArray['created_at'],
            $parentModelArray['updated_at'],
            $parentModelArray['deleted_at'],
            $parentModelArray['parent_id'],
            $parentModelArray['published'],
            $parentModelArray['order'],
            $parentModelArray['cover'],
            $parentModelArray['image'],
            $parentModelArray['images'],
            $parentModelArray['slug'],
            $parentModelArray['foreign_id'],
            $parentModelArray['brand_id'],
            $parentModelArray['sell_count'],
        );
        $parentModelArray['model'] = class_basename($resource->getModel());

        return $parentModelArray;
    }
}
