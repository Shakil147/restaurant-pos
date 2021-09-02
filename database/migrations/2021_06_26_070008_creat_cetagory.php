<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatCetagory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('categories', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name')->nullable();
        //     $table->string('slug')->nullable();
        //     $table->string('image')->nullable();
        //     $table->text('description')->nullable();
        //     $table->integer('parent_id')->nullable();
        //     $table->integer('user_id')->nullable();
        //     $table->integer('show_individual')->nullable();
        //     $table->integer('status')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
