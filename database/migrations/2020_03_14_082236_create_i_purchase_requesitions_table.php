<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIPurchaseRequesitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_purchase_requesitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requesistion_number')->unique();
            $table->string('requested_by')->nullable();
            $table->string('remark')->nullable();
            $table->string('approval_status');//values=>pending, processed(approved),and denied 
            $table->smallInteger('delivery_status');
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
        Schema::dropIfExists('i_purchase_requesitions');
    }
}
