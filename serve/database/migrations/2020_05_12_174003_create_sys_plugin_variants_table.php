<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysPluginVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_plugin_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sys_plugin_id');
            $table->foreign('sys_plugin_id')->references('id')->on('sys_plugins')->onDelete('cascade');
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
        Schema::dropIfExists('sys_plugin_variants');
    }
}
