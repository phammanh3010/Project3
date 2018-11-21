<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectScheduelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_scheduels', function (Blueprint $table) {
            $table->increments('id_subject_scheduel');
            $table->integer('id_subject')->unsigned();
            $table->string('semester');
            $table->foreign('id_subject')->references('id_subject')->on('subjects');
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
        Schema::dropIfExists('subject_scheduels');
    }
}
