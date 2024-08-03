<?php

namespace Zoker\Shop\Enums;

enum CartStatus: string
{
    case CREATED = 'created';
    case TRANSFERRED = 'transferred';
    case ORDERED = 'ordered';
}
