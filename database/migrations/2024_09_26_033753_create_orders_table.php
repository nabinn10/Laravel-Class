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
            // user id
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // product id
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // quantity
            $table->integer('qty');
            // total price
            $table->integer('price');
            // status
            $table->string('status')->default('Pending');
            // payment method
            $table->string('payment_method');
            // name
            $table->string('name');
            // phone
            $table->string('phone');
            // address
            $table->text('address');
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
