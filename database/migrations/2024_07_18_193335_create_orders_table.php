<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('general_order_status_id')->nullable()->constrained()->on('order_statuses')->nullOnDelete();
            $table->foreignId('payment_order_status_id')->nullable()->constrained()->on('order_statuses')->nullOnDelete();
            $table->foreignId('shipping_order_status_id')->nullable()->constrained()->on('order_statuses')->nullOnDelete();
            $table->unsignedInteger('total_products');
            $table->unsignedInteger('total_shipping');
            $table->unsignedInteger('total_payment_fee');
            $table->unsignedInteger('total_pre_payment');
            $table->text('user_data');
            $table->foreignId('shipping_address_id')->nullable()->constrained()->on('addresses')->nullOnDelete();
            $table->text('shipping_address_data');
            $table->foreignId('billing_address_id')->nullable()->constrained()->on('addresses')->nullOnDelete();
            $table->text('billing_address_data');
            $table->foreignId('shipping_method_id')->nullable()->constrained()->nullOnDelete();
            $table->text('shipping_method_data');
            $table->foreignId('payment_method_id')->nullable()->constrained()->nullOnDelete();
            $table->text('payment_method_data');
            $table->string('ip_address');
            $table->dateTime('shipped_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
