<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('CPF')->unique();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->date('data_primeira_dose')->nullable();
            $table->date('data_segunda_dose')->nullable();
            $table->date('data_terceira_dose')->nullable();
            $table->char('comorbidade'); 
            $table->foreignId('vacines_id')->constrained();   
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
        Schema::dropIfExists('employees');
    }
}
