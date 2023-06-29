<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingTransactionPayment extends Model
{
    use HasFactory;

    protected $table = 'outgoing_transaction_payments';

    protected $guarded = [];
}
