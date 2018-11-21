<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id_group');
            $table->integer('id_subject')->unsigned();;
            $table->integer('id_teacher')->unsigned();;
            $table->string('group_name');
            $table->string('project_name');
            $table->string('semester');
            $table->integer('finish_project');
            $table->foreign('id_subject')->references('id_subject')->on('subjects');
            $table->foreign('id_teacher')->references('id_teacher')->on('teachers');
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
        Schema::dropIfExists('groups');
    }
}
