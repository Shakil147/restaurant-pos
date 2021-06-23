<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('order_code');
            $table->integer('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->float('price', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('discount')->nullable();
            $table->float('discount_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oder_items');
    }
}
