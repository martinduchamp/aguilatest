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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number');
            $table->string('type');
            $table->string('plates');
            $table->string('brand');
            $table->string('vin');
            $table->string('model');
            $table->decimal('performance');
            $table->string('color');
            $table->tinyInteger('workshop');
            $table->string('excelco');
            $table->string('energex');
            $table->string('gps_id');
            $table->string('policy');

            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
