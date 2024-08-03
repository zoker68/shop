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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedInteger('parent_id')->default(1);
            $table->boolean('published')->default(true);
            $table->unsignedInteger('order')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        \Zoker\Shop\Models\Category::create([
            'name' => 'Root',
            'slug' => '',
            'parent_id' => 0,
            'order' => 0,
            'published' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
