<?php

namespace Zoker\Shop\Enums;

use Zoker\Shop\Exceptions\SetViewTypeException;

enum ViewType: string
{
    case List = 'list';
    case Grid = 'grid';

    public static function getType()
    {
        if (auth()->check() && auth()->user()->view_type instanceof self) {
            return auth()->user()->view_type;
        }

        $viewTypeValue = session('viewType') ?? request()->cookie('viewType') ?? self::Grid->value;

        self::setCookieAndSession($viewTypeValue);

        return self::from($viewTypeValue);
    }

    public static function setType(string $type): self
    {
        try {
            $viewType = self::from($type);
        } catch (\Exception $exception) {
            throw new SetViewTypeException;
        }

        if (auth()->check()) {
            auth()->user()->view_type = $viewType;
            auth()->user()->save();

            return $viewType;
        }

        self::setCookieAndSession($viewType->value);

        return $viewType;
    }

    public static function setCookieAndSession(string $viewTypeValue): void
    {
        cookie('viewType', $viewTypeValue, 60 * 24 * 30 * 12 * 10);
        session(['viewType' => $viewTypeValue]);
    }

    public function getTemplate(): string
    {
        return match ($this) {
            self::List => 'livewire.shop.products.list',
            self::Grid => 'livewire.shop.products.grid',
        };
    }
}
