<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoker\Shop\Classes\Bases\BaseModel;

class OrderProduct extends BaseModel
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'product_data' => 'array',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
