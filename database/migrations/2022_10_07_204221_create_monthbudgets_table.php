<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthbudgets', function (Blueprint $table) {
            $table->id();
            $table->string('unitquantity');
            $table->string('price');
            $table->string('total');
            $table->string('dollar');
            $table->string('date');
             // define foreign key
             $table->foreignId('idbudget')
             ->constrained('budgets')
             ->onUpdate('cascade')
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
        Schema::dropIfExists('monthbudgets');
    }
};
