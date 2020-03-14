<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIGenericNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_generic_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_number')->unique();
            $table->string('generic_name');
            $table->string('generic_name_description');
            $table->unsignedBigInteger('i_brand_names_id');
            $table->foreign('i_brand_names_id')
                ->references('id')->on('i_brand_names')
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
        Schema::dropIfExists('i_generic_names');
    }
}
