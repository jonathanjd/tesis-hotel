<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inic');
            $table->date('fecha_fin');
            $table->string('hora');
            $table->integer('personas');
            $table->text('observacion');

            $table->integer('budget_id')->unsigned();
            $table->integer('evento_id')->unsigned();

            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');

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
        Schema::dropIfExists('detail_eventos');
    }
}
