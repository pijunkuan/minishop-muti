<?php

use App\Models\UserWalletRefundList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWalletRefundListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallet_refund_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('user_wallets')->onDelete('cascade');
            $table->string('no',45);
            $table->string('pay_no',45);
            $table->string('way',10);
            $table->decimal('amount');
            $table->decimal('fee');
            $table->string('content')->nullable();
            $table->string('status',10)->default(UserWalletRefundList::RECORD_STATUS_PENDING);
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
        Schema::dropIfExists('user_wallet_refund_lists');
    }
}
