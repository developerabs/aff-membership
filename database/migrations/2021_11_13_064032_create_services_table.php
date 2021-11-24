<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('auth_id');
            $table->string('title');
            $table->string('slug');
            $table->integer('cat_id');
            $table->longText('details');
            $table->string('price');
            $table->string('delivery_days');
            $table->string('service_img');
            $table->string('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('services');
    }
}
