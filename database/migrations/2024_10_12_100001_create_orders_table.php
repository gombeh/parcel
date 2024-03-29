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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('customers', 'id')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('customers', 'id')->onDelete('cascade');
            $table->enum("status",['register_order', 'populate', 'proccess_in_hub', 'distribute', 'delivered'])
            ->default("register_order")
            ->index(); // for cache for search 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
