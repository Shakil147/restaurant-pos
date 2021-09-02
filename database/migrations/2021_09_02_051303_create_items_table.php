<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->float('purchase_price',20,2)->default(0);
            $table->float('selling_price',20,2)->default(0);
            //$table->integer('opening_stock')->default(0);
            $table->integer('user_id')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('items');
    }
}
