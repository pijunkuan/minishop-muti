<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceAndValueToAppShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_shipments', function (Blueprint $table) {
            $table->decimal('price_1')->nullable();
            $table->decimal('value_1')->nullable();
            $table->decimal('price_2')->nullable();
            $table->decimal('value_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_shipments', function (Blueprint $table) {
            $table->dropColumn('price_1');
            $table->dropColumn('value_1');
            $table->dropColumn('price_2');
            $table->dropColumn('value_2');
        });
    }
}
