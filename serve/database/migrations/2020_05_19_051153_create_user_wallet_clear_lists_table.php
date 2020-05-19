<?php

use App\Models\UserWalletClearList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWalletClearListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallet_clear_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('user_wallets')->onDelete('cascade');
            $table->decimal('amount');
            $table->decimal('fee');
            $table->integer('order_count');
            $table->string('status',10)->default(UserWalletClearList::CLEAR_STATUS_PENDING);
            $table->timestamp('unlocked_at');
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
        Schema::dropIfExists('user_wallet_clear_lists');
    }
}
