<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuccessAtToUserWalletWithdrawCashListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_wallet_withdraw_cash_lists', function (Blueprint $table) {
            $table->timestamp('success_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_wallet_withdraw_cash_lists', function (Blueprint $table) {
            $table->dropColumn('success_at');
        });
    }
}
