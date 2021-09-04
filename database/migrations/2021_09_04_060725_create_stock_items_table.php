<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('stock_items');
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_id');
            $table->string('type')->nullable();
            $table->integer('item_id');
            $table->float('price',20,2);
            $table->float('quantity',20,3);
            $table->float('total',20,2);
            $table->integer('previous_stock');
            $table->integer('current_stock');
            $table->timestamp('date')->nullable();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_items');
    }
}
