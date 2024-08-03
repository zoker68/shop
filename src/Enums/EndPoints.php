<?php

namespace Zoker68\Shop\Enums;

enum EndPoints: string
{
    case CATEGORIES = 'https://api.moysklad.ru/api/remap/1.2/entity/productfolder';
    case PRODUCTS = 'https://api.moysklad.ru/api/remap/1.2/entity/assortment';
}
