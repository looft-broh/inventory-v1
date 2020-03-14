<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIMedicalRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_medical_representatives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('medrep_id')->unique();
            $table->unsignedBIgInteger('i_people_id');
            $table->foreign('i_people_id')
                ->references('id')->on('i_people_id')
                ->onDelete('cascade');
            $table->string('contact_number1');
            $table->string('contact_number2')->nullable();
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->string('email_address');
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
        Schema::dropIfExists('i_medical_representatives');
    }
}
