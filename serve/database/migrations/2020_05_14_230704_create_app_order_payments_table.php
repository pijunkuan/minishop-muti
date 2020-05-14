<?php

use App\Models\OrderPayment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_order_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('app_orders')->onDelete('cascade');
            $table->string('no',45);
            $table->string('pay_no')->nullable();
            $table->string('payment_method',45);
            $table->decimal('pay_amount');
            $table->string('status',45)->default(OrderPayment::PAYMENT_STATUS_PENDING);
            $table->timestamp('pay_at')->nullable();
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
        Schema::dropIfExists('app_order_payments');
    }
}
