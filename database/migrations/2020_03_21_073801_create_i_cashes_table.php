<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateICashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_cashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_details_id');
            $table->foreign('payment_details_id')
                ->references('id')->on('i_payment_details')
                ->onDelete('cascade');
            $table->string('amount');
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
        Schema::dropIfExists('i_cashes');
    }
}
