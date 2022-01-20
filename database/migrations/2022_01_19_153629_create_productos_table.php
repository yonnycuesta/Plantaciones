<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('tamano_id')->unsigned();
            $table->bigInteger('etapa_id')->unsigned();
            $table->integer('stock')->default(0);
            $table->integer('cantidad_demandada')->default(0);
            $table->double('precio_unitario', 12, 2);
            $table->string('imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('productos');
    }
}
