<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateICustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBIgInteger('i_people_id');
            $table->foreign('i_people_id')
                ->references('id')->on('i_people_id')
                ->onDelete('cascade');
            $table->string('account_name');//clinik-name/representative
            $table->string('cutomer_type');//Doctors-Clink, Chain Drug Store, and Pharmacy
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
        Schema::dropIfExists('i_customers');
    }
}
