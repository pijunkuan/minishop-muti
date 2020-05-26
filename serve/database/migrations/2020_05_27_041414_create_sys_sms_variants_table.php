<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSmsVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_sms_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sys_sms_id');
            $table->foreign('sys_sms_id')->references('id')->on('sys_sms')->onDelete('cascade');
            $table->decimal('price');
            $table->decimal('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_sms_variants');
    }
}
