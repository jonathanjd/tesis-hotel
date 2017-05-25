<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_recibo');
            $table->date('fecha_pago');
            $table->decimal('monto', 7, 2);
            $table->string('forma_pago');
            $table->string('numero_comprobante');
            $table->string('banco');
            $table->string('concepto');
            
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
        Schema::dropIfExists('abonos');
    }
}
