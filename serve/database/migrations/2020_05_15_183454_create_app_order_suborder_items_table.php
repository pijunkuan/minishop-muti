<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppOrderSuborderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_order_suborder_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('suborder_id');
            $table->foreign('suborder_id')->references('id')->on('app_order_suborders')->onDelete('cascade');
            $table->unsignedBigInteger('variant_id');
            $table->string('variant_code',45)->nullable();
            $table->string('product_unit',45)->nullable();
            $table->string('product_title');
            $table->string('variant_title');
            $table->decimal('price');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_order_suborder_items');
    }
}
