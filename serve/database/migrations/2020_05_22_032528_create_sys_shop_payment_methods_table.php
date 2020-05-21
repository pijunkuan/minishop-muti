<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysShopPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_shop_payment_methods', function (Blueprint $table) {
            $table->string('code',10);
            $table->string('title',10);
            $table->string('img')->nullable();
            $table->string('des')->nullable();
            $table->boolean('need_setting')->default(false);
            $table->boolean('need_wallet')->default(false);
            $table->boolean('active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_shop_payment_methods');
    }
}
