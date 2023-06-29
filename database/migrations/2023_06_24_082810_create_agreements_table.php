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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('sender_origin_and_destinations_id');
            $table->unsignedBigInteger('receiver_origin_and_destinations_id');
            $table->unsignedBigInteger('sender_fence_id');
            $table->unsignedBigInteger('receiver_fence_id');
            $table->string('type');
            $table->decimal('import_salary');
            $table->decimal('desamarre', 11, 2);
            $table->decimal('desenlone', 11, 2);
            $table->decimal('voucher', 11, 2);
            $table->decimal('to_load', 11, 2);
            $table->decimal('amarre', 11, 2);
            $table->decimal('enlone', 11, 2);
            $table->string('currency', 10);
            $table->unsignedBigInteger('route_id');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('sender_origin_and_destinations_id')->references('id')->on('origin_destinations')->onDelete('cascade');
            $table->foreign('sender_fence_id')->references('id')->on('fences')->onDelete('cascade');
            $table->foreign('receiver_fence_id')->references('id')->on('fences')->onDelete('cascade');

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};
