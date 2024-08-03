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
        Schema::create('sklad_logs', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->string('uri');
            $table->longText('response');
            $table->integer('code')->unsigned();
            $table->double('query_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sklad_logs');
    }
};
