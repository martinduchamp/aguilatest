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
        // Schema::create('cicles', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('status');
        //     $table->string('control');
        //     $table->unsignedBigInteger('vehicle_id')->nullable();
        //     $table->unsignedBigInteger('operator_id')->nullable();
        //     $table->string('platform');
        //     $table->string('plates');
        //     $table->integer('days');
        //     $table->tinyInteger('direct');
        //     $table->string('trailer_type');
        //     $table->unsignedBigInteger('owner_id');
        //     $table->unsignedBigInteger('origin_fence');
        //     $table->unsignedBigInteger('destination_fence');
        //     $table->string('observations');
        //     $table->tinyInteger('closed')->default('0');

        //     $table->foreign('vehicle_id');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('cicles');
    }
};
