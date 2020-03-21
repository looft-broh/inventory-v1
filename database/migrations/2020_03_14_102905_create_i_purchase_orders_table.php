<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIPurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po_number')->unique();
            $table->unsignedBigInteger('medrep_id');
            $table->foreign('medrep_id')
                ->references('id')->on('i_medical_representatives')
                ->onDelete('cascade');
            $table->unsignedBigInteger('customers_id');
            $table->foreign('customers_id')
                ->references('id')->on('i_customers')
                ->onDelete('cascade');    
            $table->string('po_status');//value -> fullfiled or pending
            $table->string('aproval');//value -> hold or unhold
            $table->string('aproval_date');
            $table->string('po_type');//value -> contract, regular or in-house
            $table->string('shipping_terms');//value -> pick-up or deliver
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
        Schema::dropIfExists('i_purchase_orders');
    }
}
