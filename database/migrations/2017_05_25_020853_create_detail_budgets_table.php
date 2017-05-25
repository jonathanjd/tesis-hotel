<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('cantidad');
            $table->unsignedSmallInteger('dias');
            $table->decimal('precio_total', 7, 2);
            $table->string('hora');
            $table->date('fecha_inic');
            $table->date('fecha_fin');
            $table->text('descripcion');
            $table->integer('descuento');

            $table->integer('budget_id')->unsigned();
            $table->integer('producto_servicio_id')->unsigned();

            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
            $table->foreign('producto_servicio_id')->references('id')->on('producto_servicios')->onDelete('cascade');

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
        Schema::dropIfExists('detail_budgets');
    }
}
