<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingTransactionPayment extends Model
{
    use HasFactory;

    protected $table = 'incoming_transaction_payments';

    protected $guarded = [];
}
