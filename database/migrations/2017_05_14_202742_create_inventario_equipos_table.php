<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('cantidad');
            $table->smallInteger('existencia');

            $table->integer('producto_servicio_id')->unsigned();
            $table->foreign('producto_servicio_id')
                ->references('id')->on('producto_servicios')
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
        Schema::dropIfExists('inventario_equipos');
    }
}
