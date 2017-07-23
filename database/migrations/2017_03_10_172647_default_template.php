<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('default_template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->longText('Source');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('default_template', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_template');
    }
}
