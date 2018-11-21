<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvalutionCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evalution_criterias', function (Blueprint $table) {
            $table->increments('id_evalution_criteria');
            $table->integer('id_group')->unsigned();;
            $table->string('content');
            $table->float('bonus');
            $table->foreign('id_group')->references('id_group')->on('groups');
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
        Schema::dropIfExists('evalution_criterias');
    }
}
