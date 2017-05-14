<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMontajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_montajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipomontaje');

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
        Schema::dropIfExists('tipo_montajes');
    }
}
