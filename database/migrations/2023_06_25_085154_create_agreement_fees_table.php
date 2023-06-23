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
        Schema::create('agreement_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agreement_id');
            $table->unsignedBigInteger('fee_id');
            $table->string('currency');
            $table->decimal('amount');
            $table->tinyInteger('retention')->default('0');

            $table->foreign('agreement_id')->references('id')->on('agreements');
            $table->foreign('fee_id')->references('id')->on('fees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreement_fees');
    }
};
