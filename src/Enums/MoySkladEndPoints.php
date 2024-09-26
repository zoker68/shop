<?php

namespace Zoker\Shop\Enums;

enum MoySkladEndPoints: string
{
    case CATEGORIES = 'https://api.moysklad.ru/api/remap/1.2/entity/productfolder';
    case PRODUCTS = 'https://api.moysklad.ru/api/remap/1.2/entity/assortment';

    case USERS = 'https://api.moysklad.ru/api/remap/1.2/entity/counterparty';

}
