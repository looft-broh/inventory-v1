<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIMRPOStackOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //m = medical : r = representative : p = purchase : o = order            
        Schema::create('i_m_r_p_o_stack_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('generic_names_id');
            $table->foreign('generic_names_id')
                ->references('id')->on('i_generic_names')
                ->onDelete('cascade');
            $table->unsignedBigInteger('po_id');
            $table->foreign('po_id')
                ->references('id')->on('i_purchase_orders')
                ->onDelete('cascade');
            $table->string('order_status');//value-> complete or in-complete
            $table->integer('number_of_items');//number of items to be out
            $table->string('unit_cost');
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
        Schema::dropIfExists('i_m_r_p_o_stack_outs');
    }
}
