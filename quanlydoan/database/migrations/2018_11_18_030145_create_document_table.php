<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->increments('id_document');
            $table->integer('id_group')->unsigned();
            $table->foreign('id_group')->references('id_group')->on('group')->onDelete('cascade');
            $table->string('type',45);
            $table->string('path',200);
            $table->float('evaluate')->nullable();
            $table->string('user_upload', 45);
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document');
    }
}
