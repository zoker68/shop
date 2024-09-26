<?php

namespace Zoker\Shop\Enums;

use Illuminate\Database\Eloquent\Builder;

enum ProductsSorting: string
{
    case BESTSELLERS = 'bestsellers';
    case PRICE_ASC = 'price-asc';
    case PRICE_DESC = 'price-desc';
    case NAME_ASC = 'name-asc';
    case NAME_DESC = 'name-desc';
    case CREATED_ASC = 'created-asc';
    case CREATED_DESC = 'created-desc';
    case RANKING_DESC = 'ranking-desc';
    case RANKING_ASC = 'ranking-asc';

    public function getLabel(): string
    {
        return match ($this) {
            self::NAME_ASC => __('shop::products.sorting.name_asc'),
            self::NAME_DESC => __('shop::products.sorting.name_desc'),
            self::CREATED_ASC => __('shop::products.sorting.created_asc'),
            self::CREATED_DESC => __('shop::products.sorting.created_desc'),
            self::PRICE_ASC => __('shop::products.sorting.price_asc'),
            self::PRICE_DESC => __('shop::products.sorting.price_desc'),
            self::BESTSELLERS => __('shop::products.sorting.bestsellers'),
            self::RANKING_DESC => __('shop::products.sorting.ranking_desc'),
            self::RANKING_ASC => __('shop::products.sorting.ranking_asc'),
        };
    }

    public function getSortColumn(): string
    {
        return match ($this) {
            self::NAME_ASC, self::NAME_DESC => 'name',
            self::CREATED_ASC, self::CREATED_DESC => 'created_at',
            self::PRICE_ASC, self::PRICE_DESC => 'price',
            self::BESTSELLERS => 'sell_count',
            self::RANKING_ASC, self::RANKING_DESC => 'reviews_avg_rating',
        };
    }

    public function getSortDirection(): string
    {
        return match ($this) {
            self::NAME_ASC, self::CREATED_ASC, self::PRICE_ASC, self::RANKING_ASC => 'asc',
            self::NAME_DESC, self::CREATED_DESC, self::PRICE_DESC, self::BESTSELLERS, self::RANKING_DESC => 'desc',
        };
    }

    public function getSortQuery(Builder $query): Builder
    {
        return $query->orderBy($this->getSortColumn(), $this->getSortDirection())
            ->when($this === self::RANKING_DESC || $this === self::RANKING_ASC, function ($query) {
                $query->orderByDesc('reviews_count');
            });
    }

    public static function getOptions(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->getLabel();
        }

        return $options;
    }

    public static function getSortingOption(?string $filter): self
    {
        return self::isValidOption($filter)
            ? self::from($filter)
            : config('shop.category.defaultSort');
    }

    public static function isValidOption(?string $option): bool
    {
        $validOptions = array_column(self::cases(), 'value');

        return in_array($option, $validOptions);
    }
}
