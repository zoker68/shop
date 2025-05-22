<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\Pages\ViewRecord;
use Zoker\Shop\Traits\Extendable;
use Zoker\Shop\Traits\Resources\ExtendRecordHeader;

abstract class BaseViewRecord extends ViewRecord
{
    use Extendable;
    use ExtendRecordHeader;
}
