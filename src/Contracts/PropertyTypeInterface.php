<?php

namespace Zoker\Shop\Contracts;

interface PropertyTypeInterface
{
    public function label(): string;

    public function hasOptions(): bool;

    public function getOptionsForm(): array;

    public function getValueBladeComponentName(): string;
}
