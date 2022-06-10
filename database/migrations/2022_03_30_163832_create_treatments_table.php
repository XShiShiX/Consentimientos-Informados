<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->string('nombre');
            $table->longText('texto');
            $table->string('comentarios')->nullable();
            $table->string('fechacreacion')->default(date("d-m-y"));
            $table->string('usuariocreador')->nullable();
            $table->string('fechamodificacion')->default(date("d-m-y")) ->nullable();
            $table->string('ultimocreador')->nullable();
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
        Schema::dropIfExists('treatments');
    }
}
