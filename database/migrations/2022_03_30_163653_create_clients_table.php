<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->string('nombrecompleto');
           // $table->string('apellido1');
            //$table->string('apellido2');
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('pais');
            $table->string('codigopostal');
            $table->string('numeroid');
            $table->date('fechanacimiento')->default(date("d-m-y"));
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();

            $table->boolean('esmenor')->default(false);
            $table->string('edad')->nullable();

            $table->string('usuariocreador')->nullable();
            $table->date('fechacreacion')->default(date("d-m-y"));
            $table->date('fechamodificacion')->default(date("d-m-y"))->nullable();
            $table->string('ultimocreador')->nullable();

            $table->string('nombretutor')->nullable();
            $table->string('direcciontutor')->nullable();
            $table->string('poblaciontutor')->nullable();
            $table->string('provinciatutor')->nullable();
            $table->string('paistutor')->nullable();
            $table->string('codigopostaltutor')->nullable();
            $table->string('numeroidtutor')->nullable();
            $table->string('fechanacimientotutor')->default(date("d-m-y"))->nullable();
            $table->string('emailtutor')->nullable();
            $table->string('telefonotutor')->nullable();
            $table->string('vinculacion')->nullable();

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
        Schema::dropIfExists('clients');
    }
}
