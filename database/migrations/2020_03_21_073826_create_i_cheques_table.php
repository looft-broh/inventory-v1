<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_cheques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_details_id');
            $table->foreign('payment_details_id')
                ->references('id')->on('i_payment_details')
                ->onDelete('cascade');
            $table->string('checque_status');
            $table->string('account_holder');
            $table->string('bank_name');
            $table->string('bank_address');
            $table->string('type_of_cheque');
            $table->string('current_date');
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
        Schema::dropIfExists('i_cheques');
    }
}
