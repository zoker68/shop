<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\Pages\EditRecord;
use Zoker\Shop\Traits\Extendable;
use Zoker\Shop\Traits\Resources\ExtendRecordHeader;

abstract class BaseViewRecord extends EditRecord
{
    use Extendable;
    use ExtendRecordHeader;
}
