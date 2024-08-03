<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session', 100)->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained()->nullOnDelete();
            $table->string('zip', 20);
            $table->string('city', 100);
            $table->string('address');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
