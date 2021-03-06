<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->unique();
            $table->string('requested_by');
            $table->integer('user_id')->unsigned();
            $table->string('client');
            $table->date('from');
            $table->string('project');
            $table->string('origin');
            $table->longText('agent_notes')->nullable();
            $table->longText('admin_notes')->nullable();
            $table->longText('director_notes')->nullable();
            $table->integer('director_id')->nullable();
            $table->integer('vehicle_type_id')->unsigned();
            $table->integer('vehicle_id')->unsigned()->nullable();
            $table->integer('asset_id')->unsigned()->nullable();
            $table->integer('driver_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->default(1);
            $table->integer('agency_id')->unsigned()->nullable();
            $table->date('deploy_date')->nullable();
            $table->date('return_date')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
