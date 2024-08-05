<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('widget_slides', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->string('heading')->nullable();
            $table->text('text')->nullable();
            $table->string('button')->nullable();
            $table->string('link')->nullable();
            $table->string('target')->nullable();
            $table->string('image')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('widget_slides');
    }
};
