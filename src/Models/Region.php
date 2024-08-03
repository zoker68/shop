<?php

namespace Zoker\Shop\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeForCountryId(Builder $query, int $countryId): Builder
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
            Select::make('country_id')
                ->label(__('zoker.shop::region.admin.form.country'))
                ->relationship('country', 'name')
                ->searchable()
                ->required(),

            TextInput::make('name')
                ->label(__('zoker.shop::region.admin.form.name'))
                ->required(),

            TextInput::make('code')
                ->label(__('zoker.shop::region.admin.form.code'))
                ->required(),

            Toggle::make('published')
                ->label(__('zoker.shop::region.admin.form.published')),
        ];
    }
}
