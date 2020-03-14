<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIRequestStockSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_request_stock_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('at_cost');
            $table->bigInteger('requested_qty');
            $table->unsignedBigInteger('i_brand_names_id');
            $table->foreign('i_brand_names_id')
                ->references('id')->on('i_brand_names')
                ->onDelete('cascade');
            $table->unsignedBigInteger('i_suppliers_id');
            $table->foreign('i_suppliers_id')
                ->references('id')->on('i_suppliers')
                ->onDelete('cascade');
            $table->unsignedBigInteger('i_purchase_requesitions_id');
            $table->foreign('i_purchase_requesitions_id')
                ->references('id')->on('i_purchase_requesitions')
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
        Schema::dropIfExists('i_request_stock_suppliers');
    }
}
