<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentSubjectScheduelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_subject_scheduels', function (Blueprint $table) {
            $table->increments('id_content_subject_scheduel');
            $table->integer('id_subject_scheduel')->unsigned();
            $table->dateTime('time_deadline');
            $table->string('require');
            $table->float('penalty');
            $table->foreign('id_subject_scheduel')->references('id_subject_scheduel')->on('subject_scheduels');
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
        Schema::dropIfExists('content_subject_scheduels');
    }
}
