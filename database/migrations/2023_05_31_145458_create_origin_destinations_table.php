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
        Schema::create('origin_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('street');
            $table->string('rfc');
            $table->string('postal_code');
            $table->string('city');
            $table->string('exterior_number');
            $table->string('interior_number')->nullable();
            $table->string('country');
            $table->string('state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_destinations');
    }
};
