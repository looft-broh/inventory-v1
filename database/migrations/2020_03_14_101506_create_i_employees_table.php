<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id')->unique();
            $table->unsignedBIgInteger('i_people_id');
            $table->foreign('i_people_id')
                ->references('id')->on('i_people_id')
                ->onDelete('cascade');
            $table->string('designation');
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
        Schema::dropIfExists('i_employees');
    }
}
