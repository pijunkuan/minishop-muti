<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWalletWithdrawCashListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallet_withdraw_cash_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('user_wallets')->onDelete('cascade');
            $table->decimal('amount');
            $table->decimal('fee');
            $table->string('way',10);
            $table->string('type',10);
            $table->string('no',45);
            $table->string('content')->nullable();
            $table->string('status',10);
            $table->json('account');

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
        Schema::dropIfExists('user_wallet_withdraw_cash_lists');
    }
}
