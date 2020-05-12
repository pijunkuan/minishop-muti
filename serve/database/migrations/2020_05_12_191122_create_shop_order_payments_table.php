<?php

use App\Models\ShopOrderPayment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_order_no');
            $table->string('payment_method',10);
            $table->string("pay_no");
            $table->decimal('amount');
            $table->string('status',10)->default(ShopOrderPayment::PAYMENT_STATUS_PENDING);
            $table->timestamp('pay_at');
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
        Schema::dropIfExists('shop_order_payments');
    }
}
