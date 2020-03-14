<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIRequestStockDeliveryHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_request_stock_delivery_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_lot_number')->unique();//product number
            $table->string('expiration_date');
            $table->bigInteger('actual_delivery_qty');
            $table->unsignedBigInteger('i_rss_id');//i_request_stock_suppliers_id = i_rss_id
            $table->foreign('i_rss_id')
                ->references('id')->on('i_request_stock_suppliers')
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
        Schema::dropIfExists('i_request_stock_delivery_histories');
    }
}
