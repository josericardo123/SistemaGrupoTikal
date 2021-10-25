<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapeleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papelerias', function (Blueprint $table) {
            $table->id();
            $table->string('producto_codigo');
            $table->string('nombre_producto');
            $table->text('descripcion');
            $table->string('marca');
            $table->unsignedBigInteger('tipo_producto_id');
            $table->integer('entradas');
            $table->integer('salidas');
            $table->integer('total');
            $table->decimal('precio_unidad');
            //$table->decimal('precio_unidad_venta');
            $table->integer('estatus');

            $table->foreign('tipo_producto_id')
                ->references('id')
                ->on('papeleriatipoproductos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('papelerias');
    }
}
