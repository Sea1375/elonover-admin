<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id', 11)->nullable();
            $table->string('payment_code')->nullable();
            $table->string('token_amount')->nullable();
            $table->string('wallet_address')->nullable();
            $table->double('buy_cost', 10, 6)->nullable();
            $table->string('payment_status')->nullable();
            $table->string('purchase_status')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('block')->nullable();
            $table->string('tx_hash')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
