<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agency_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            // $table->foreign('agency_id')->references('id')->on('agencies');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency_user');
    }
}
