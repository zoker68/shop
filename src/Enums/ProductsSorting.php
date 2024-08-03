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

    public static function getByValue(string $sort): self
    {
        return match ($sort) {
            'name-asc' => self::NAME_ASC,
            'name-desc' => self::NAME_DESC,
            'created-asc' => self::CREATED_ASC,
            'created-desc' => self::CREATED_DESC,
            'price-asc' => self::PRICE_ASC,
            'price-desc' => self::PRICE_DESC,
            'bestsellers' => self::BESTSELLERS,
        };
    }

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
        };
    }

    public function getSortColumn(): string
    {
        return match ($this) {
            self::NAME_ASC => 'name',
            self::NAME_DESC => 'name',
            self::CREATED_ASC => 'created_at',
            self::CREATED_DESC => 'created_at',
            self::PRICE_ASC => 'price',
            self::PRICE_DESC => 'price',
            self::BESTSELLERS => 'sell_count',
        };
    }

    public function getSortDirection(): string
    {
        return match ($this) {
            self::NAME_ASC => 'asc',
            self::NAME_DESC => 'desc',
            self::CREATED_ASC => 'asc',
            self::CREATED_DESC => 'desc',
            self::PRICE_ASC => 'asc',
            self::PRICE_DESC => 'desc',
            self::BESTSELLERS => 'desc',
        };
    }

    public function getSortQuery(Builder $query): Builder
    {
        return $query->orderBy($this->getSortColumn(), $this->getSortDirection());
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
            ? self::getByValue($filter)
            : config('shop.category.defaultSort');
    }

    public static function isValidOption(?string $option): bool
    {
        $validOptions = array_column(self::cases(), 'value');

        return in_array($option, $validOptions);
    }
}
