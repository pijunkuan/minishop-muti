<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_file')->nullable();
            $table->string('img_link')->nullable();
            $table->string('img_name');
            $table->integer('img_bytes');
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
        Schema::dropIfExists('admin_images');
    }
}
