<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('consents', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->foreign('cliente')->references('id')->on('clients')->onDelete("cascade");
            $table->foreign('documentotratamiento')->references('id')->on('treatments');

            $table->unsignedBigInteger('cliente');
            $table->binary('firma')->nullable();
            $table->dateTime('fechahora');
            $table->unsignedBigInteger('documentotratamiento');

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
        Schema::dropIfExists('consents');
    }
}
