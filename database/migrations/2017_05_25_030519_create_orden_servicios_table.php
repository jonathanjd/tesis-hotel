<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_orden');
            $table->date('fecha');
            $table->text('obsv_cocina');
            $table->text('obsv_restaurant');
            $table->text('obsv_coord_ab');
            $table->text('obsv_mayordomia');
            $table->text('obsv_reception');
            $table->text('obsv_eventoc');

            $table->integer('budget_id')->unsigned();

            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');

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
        Schema::dropIfExists('orden_servicios');
    }
}
