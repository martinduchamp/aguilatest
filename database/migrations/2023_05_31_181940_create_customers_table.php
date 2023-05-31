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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('postal_code');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('area')->nullable();
            $table->string('rfc');
            $table->string('currency');
            $table->string('bank_account')->nullable();
            $table->string('tax_regime');
            $table->string('payment_type');
            $table->tinyInteger('withholding');
            $table->double('iva_rate');
            $table->string('ledger_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
