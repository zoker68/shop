<?php

namespace Zoker\Shop\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Zoker\Shop\Classes\Bases\BaseModel;

class Region extends BaseModel
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeForCountryId(Builder $query, ?int $countryId): Builder
    {
        if (! $countryId > 0) {
            return $query;
        }

        return $query->where('published', true)
            ->where('country_id', $countryId);
    }

    public static function getAdminFormSchema(): array
    {
        return [
            'country_id' => Select::make('country_id')
                ->label(__('shop::region.admin.form.country'))
                ->relationship('country', 'name')
                ->searchable()
                ->preload()
                ->required(),

            'name' => TextInput::make('name')
                ->label(__('shop::region.admin.form.name'))
                ->required(),

            'code' => TextInput::make('code')
                ->label(__('shop::region.admin.form.code'))
                ->required(),

            'published' => Toggle::make('published')
                ->label(__('shop::region.admin.form.published')),
        ];
    }
}
