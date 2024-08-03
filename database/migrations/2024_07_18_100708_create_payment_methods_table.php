<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->integer('fee')->default(0);
            $table->decimal('fee_percent')->default(0);
            $table->string('image')->nullable();
            $table->boolean('published')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
