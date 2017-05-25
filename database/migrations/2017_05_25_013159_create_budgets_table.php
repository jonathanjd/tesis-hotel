<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_budget');
            $table->date('fecha_emision');
            $table->decimal('subtotal', 7, 2);
            $table->integer('iva');
            $table->decimal('total_general', 7,2);
            $table->boolean('confirmado');
            $table->date('fecha_confirmacion');
            $table->decimal('saldo', 7, 2);

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers')
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
        Schema::dropIfExists('budgets');
    }
}
