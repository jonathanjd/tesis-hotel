<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_invoice');
            $table->string('numero_control');
            $table->date('date');
            $table->decimal('total', 7, 2);
            $table->string('estado_invoice');
            
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
        Schema::dropIfExists('invoices');
    }
}
