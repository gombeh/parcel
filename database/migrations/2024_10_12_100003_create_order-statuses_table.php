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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders', 'id')->onDelete('cascade');
            $table->enum("status",['register_order', 'populate', 'proccess_in_hob', 'distribute', 'delivered'])->default("register_order");
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
    }
};
