<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysLevelVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_level_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sys_level_id');
            $table->foreign('sys_level_id')->references('id')->on('sys_levels')->onDelete('cascade');
            $table->decimal('price');
            $table->integer('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_level_variants');
    }
}
