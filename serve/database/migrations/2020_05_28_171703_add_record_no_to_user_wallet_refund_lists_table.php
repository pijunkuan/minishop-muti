<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecordNoToUserWalletRefundListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_wallet_refund_lists', function (Blueprint $table) {
            $table->string('record_no',"45");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_wallet_refund_lists', function (Blueprint $table) {
            $table->dropColumn('record_no');
        });
    }
}
