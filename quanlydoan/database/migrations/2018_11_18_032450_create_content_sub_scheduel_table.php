<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentSubScheduelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_sub_scheduel', function (Blueprint $table) {
            $table->increments('id_content_scheduel');
            $table->integer('id_subject_scheduel')->unsigned();
            $table->foreign('id_subject_scheduel')->references('id_subject_scheduel')->on('subject_scheduel')->onDelete('cascade');
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
        Schema::dropIfExists('content_sub_scheduel');
    }
}
