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
        Schema::create('order-parcel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders', 'id')->onDelete('cascade');
            $table->foreignId('parcel_id')->constrained('parcels', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order-parcel');
    }
};
