<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('session', 100)->nullable()->index();
            $table->unsignedInteger('total_products')->default(0);
            $table->unsignedInteger('total_shipping')->default(0);
            $table->unsignedInteger('total_payment_fee')->default(0);
            $table->unsignedInteger('total_pre_payment')->default(0);

            $table->string('status')->index();
            $table->text('data')->nullable();

            $table->foreignId('shipping_address_id')->nullable()->constrained()->on('addresses')->nullOnDelete();
            $table->foreignId('billing_address_id')->nullable()->constrained()->on('addresses')->nullOnDelete();

            $table->foreignId('shipping_method_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('payment_method_id')->nullable()->constrained()->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
