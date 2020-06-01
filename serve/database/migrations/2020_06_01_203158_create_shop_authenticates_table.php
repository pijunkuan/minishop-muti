<?php

use App\Models\ShopAuthenticate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAuthenticatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_authenticates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->string('type')->default(ShopAuthenticate::AUTH_TYPE_PERSON);
            $table->string('name');
            $table->string('id_no');
            $table->string('address');
            $table->string('mobile');
            $table->string('telephone')->nullable();
            $table->json('images');
            $table->string('status')->default(ShopAuthenticate::AUTH_STATUS_PENDING);
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
        Schema::dropIfExists('shop_authenticates');
    }
}
