<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sklad_categories', function (Blueprint $table) {
            $table->id();
            $table->string('foreign_id')->unique();
            $table->string('name');
            $table->string('parent');
            $table->foreignIdFor(\Zoker68\Shop\Models\Category::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sklad_categories');
    }
};
