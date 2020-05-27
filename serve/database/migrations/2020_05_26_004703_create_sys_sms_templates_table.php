<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSmsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_sms_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('template_code',45);
            $table->string('template_name',45);
            $table->string('template_type',20);
            $table->string('template_des');
            $table->string('template_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_sms_templates');
    }
}
