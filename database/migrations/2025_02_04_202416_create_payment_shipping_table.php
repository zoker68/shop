<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_shipping', function (Blueprint $table) {
            $table->foreignIdFor(\Zoker\Shop\Models\PaymentMethod::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\Zoker\Shop\Models\ShippingMethod::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_shipping');
    }
};
