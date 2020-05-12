<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTemplateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_template_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_template_id');
            $table->foreign('shop_template_id')->references('id')->on('shop_templates')->onDelete('cascade');
            $table->longText('setting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_template_settings');
    }
}
