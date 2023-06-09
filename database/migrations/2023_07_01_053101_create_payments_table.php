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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->comment('Connection to Transaction Table');
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('gross_amount', 15, 2);
            $table->string('payment_type');
            $table->string('status_code');
            $table->string('transaction_status');
            $table->string('transaction_time');
            $table->decimal('payment', 15, 2)->nullable();
            $table->decimal('money_change', 15, 2)->nullable();
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
        Schema::dropIfExists('payments');
    }
};
