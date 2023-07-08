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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->decimal('total', 15, 2);
            $table->integer('type')->comment('1 = Incoming Transaction, 2 = Outgoing Transaction');
            $table->integer('payment_type')->comment('1 = Cash, 2 = Debit')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
