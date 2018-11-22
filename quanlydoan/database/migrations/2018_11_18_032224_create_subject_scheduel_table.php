<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectScheduelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_scheduel', function (Blueprint $table) {
            $table->increments('id_subject_scheduel');
            $table->integer('id_subject')->unsigned();
            $table->foreign('id_subject')->references('id_subject')->on('subject');
            $table->string('semester', 45);
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
        Schema::dropIfExists('subject_scheduel');
    }
}
