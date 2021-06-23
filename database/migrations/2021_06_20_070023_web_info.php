<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WebInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('web_infos');
        Schema::create('web_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('address')->nullable();
            $table->string('service_charge')->nullable();
            $table->string('vat')->nullable();
            $table->string('tax')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->text('iframe')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->text('services', 10000)->nullable();
            $table->text('about_us', 10000)->nullable();
            $table->text('text_3', 10000)->nullable();
            $table->text('text_4', 10000)->nullable();
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
        Schema::dropIfExists('web_infos');
    }
}
