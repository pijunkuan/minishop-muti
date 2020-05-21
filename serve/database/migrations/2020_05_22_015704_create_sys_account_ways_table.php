<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysAccountWaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_account_ways', function (Blueprint $table) {
            $table->string('way',10);
            $table->string('title',20);
            $table->decimal('fee')->default(0.1);
            $table->decimal('fee_min')->default(1);
            $table->decimal('fee_max')->default(25);
            $table->decimal("daily_limit")->default(10000);
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_account_ways');
    }
}
