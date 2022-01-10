<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatronajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patronajes', function (Blueprint $table) {
            $table->id();
            $table->date('fechaPatronaje');
            $table->date('fechaEstimada');
            $table->text('observacion')->nullable();
            $table->integer('cantidad');
            $table->bigInteger('estanteria_id')->unsigned();
            $table->bigInteger('tamano_id')->unsigned();
            $table->bigInteger('etapa_id')->unsigned();
            $table->timestamps();

            // Relaciones

            $table->foreign('estanteria_id')->references('id')->on('estanterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tamano_id')->references('id')->on('tamanos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('etapa_id')->references('id')->on('etapas')->onDelete('cascade')->onUpdate('cascade');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patronajes');
    }
}
