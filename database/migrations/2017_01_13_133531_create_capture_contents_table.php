<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaptureContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capture_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('URL');
            $table->longText('Source');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('capture_contents', function (Blueprint $table) {
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
        Schema::dropIfExists('capture_contents');
    }
}
