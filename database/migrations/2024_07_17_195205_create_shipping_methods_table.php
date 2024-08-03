<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('sort');
            $table->string('image')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('available_from');
            $table->unsignedInteger('available_until');
            $table->string('days');
            $table->boolean('published')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
