<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtps', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('mail_host'); 
            $table->string('mail_port'); 
            $table->string('mail_username'); 
            $table->string('mail_pass'); 
            $table->string('mail_encription'); 
            $table->string('from_address')->nullable(); 
            $table->string('from_name')->nullable(); 
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
        Schema::dropIfExists('smtps');
    }
}
