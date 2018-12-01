<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->increments('id_group');
            $table->integer('id_subject')->unsigned();
            $table->foreign('id_subject')->references('id_subject')->on('subject')->onDelete('cascade');
            $table->integer('id_teacher')->unsigned();
            $table->foreign('id_teacher')->references('id_teacher')->on('teacher')->onDelete('cascade');
            $table->string('group_name',100);
            $table->string('project_name', 200);
            $table->string('semester', 45);
            $table->integer('finish_project');
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
        Schema::dropIfExists('group');
    }
}
