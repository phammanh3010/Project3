<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupScheduelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_scheduel', function (Blueprint $table) {
            $table->increments('id_scheduel');
            $table->integer('id_group')->unsigned();
            $table->foreign('id_group')->references('id_group')->on('group');
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
        Schema::dropIfExists('group_scheduel');
    }
}
