<?php

namespace Zoker68\Shop\Enums;

enum CartStatus: string
{
    case CREATED = 'created';
    case TRANSFERRED = 'transferred';
    case ORDERED = 'ordered';
}
