<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->text('value')->nullable();
            $table->text('index_value')->nullable();
        });

        Schema::table('product_property', function (Blueprint $table) {
            $table->unique(['product_id', 'property_id']);
            $table->index([DB::raw('index_value(255)')], 'idx_property_value_index_value');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_property');
    }
};
