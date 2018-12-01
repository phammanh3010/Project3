<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvalutionCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evalution_criteria', function (Blueprint $table) {
            $table->increments('id_evalution_criteria');
            $table->integer('id_group')->unsigned();
            $table->foreign('id_group')->references('id_group')->on('group')->onDelete('cascade');
            $table->string('content', 100);
            $table->float('bonus');
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
        Schema::dropIfExists('evalution_criteria');
    }
}
