<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_item_id');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreign('cart_item_id')->references('id')->on('cart_items');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
