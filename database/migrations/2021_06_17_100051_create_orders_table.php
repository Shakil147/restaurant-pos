<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->string('name')->nullable();
            $table->string('table')->nullable();
            $table->float('tax', 10, 2)->nullable();
            $table->float('vat', 10, 2)->nullable();
            $table->float('total', 10, 2)->nullable();
            $table->float('discount', 10, 2)->nullable();
            $table->float('total_discount', 10, 2)->nullable();
            $table->float('service_charge', 10, 2)->nullable();
            $table->integer('total_item')->nullable();
            $table->float('grand_total', 10, 2)->nullable();
            $table->boolean('payment_status')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('orders');
    }
}
