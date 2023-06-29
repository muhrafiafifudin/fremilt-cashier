<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_transaction_payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->comment('Connection to Outgoing Transaction Table');
            $table->string('order_id');
            $table->string('transaction_id');
            $table->decimal('gross_amount', 15, 2);
            $table->string('payment_type');
            $table->string('status_code');
            $table->string('transaction_status');
            $table->string('transaction_time');
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
        Schema::dropIfExists('outgoing_transaction_payments');
    }
};
