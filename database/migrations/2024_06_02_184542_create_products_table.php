<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('foreign_id');
            $table->foreignIdFor(\Zoker\Shop\Models\Brand::class)->nullable()->constrained()->nullOnDelete();
            $table->string('slug')->unique();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->text('description_short')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('price')->index();
            $table->text('image')->nullable();
            $table->string('status')->default('moderation');
            $table->boolean('published')->default(true);
            $table->unsignedInteger('sell_count')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->index(['status', 'published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
