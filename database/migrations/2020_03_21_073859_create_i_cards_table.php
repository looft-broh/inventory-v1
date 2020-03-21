<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateICardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_details_id');
            $table->foreign('payment_details_id')
                ->references('id')->on('i_payment_details')
                ->onDelete('cascade');
            $table->string('card_number');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('bank_name');
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
        Schema::dropIfExists('i_cards');
    }
}
