<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIStockPurchaseRequestReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_stock_purchase_request_returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('i_rsdh_id');//i_request_stock_delivery_histories_id=i_rsdh_id
            $table->foreign('i_rsdh_id')
                ->references('id')->on('i_request_stock_delivery_histories')
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
        Schema::dropIfExists('i_stock_purchase_request_returns');
    }
}
