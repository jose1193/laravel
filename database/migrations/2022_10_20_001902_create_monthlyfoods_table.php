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
        Schema::create('monthlyfoods', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('date');
            $table->string('month');
            $table->string('year');
             // define foreign key
             $table->foreignId('users_id')
             ->constrained('users')
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
        Schema::dropIfExists('monthlyfoods');
    }
};
