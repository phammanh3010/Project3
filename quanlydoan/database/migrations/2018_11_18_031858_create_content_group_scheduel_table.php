<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentGroupScheduelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_group_scheduel', function (Blueprint $table) {
            $table->increments('id_content');
            $table->integer('id_scheduel')->unsigned();
            $table->foreign('id_scheduel')->references('id_scheduel')->on('group_scheduel')->onDelete('cascade');
            $table->dateTime('time_deadline');
            $table->string('require', 200);
            $table->float('penalty');
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
        Schema::dropIfExists('content_group_scheduel');
    }
}
