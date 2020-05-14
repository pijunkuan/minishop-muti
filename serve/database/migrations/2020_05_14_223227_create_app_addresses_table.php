<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('app_customers')->onDelete('cascade');
            $table->string('name',45)->nullable();
            $table->string('province',45)->nullable();
            $table->string('city',45)->nullable();
            $table->string('district',45)->nullable();
            $table->string('detail',45)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('zip',20)->nullable();
            $table->boolean('default')->default(false);
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
        Schema::dropIfExists('app_addresses');
    }
}
