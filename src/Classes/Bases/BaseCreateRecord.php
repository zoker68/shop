<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Traits\Extendable;
use Zoker\Shop\Traits\Resources\ExtendRecordHeader;

abstract class BaseCreateRecord extends CreateRecord
{
    use Extendable;
    use ExtendRecordHeader;
}
