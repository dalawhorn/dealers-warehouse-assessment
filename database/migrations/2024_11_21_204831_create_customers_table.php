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
            $table->string('name', 250);
            $table->string('address_1', 250);
            $table->string('address_2', 250);
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('zip', 5);
            $table->string('phone', 10);
            $table->string('email', 500);
            $table->json('shipment_days');
            $table->foreignId('business_type_id');
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
