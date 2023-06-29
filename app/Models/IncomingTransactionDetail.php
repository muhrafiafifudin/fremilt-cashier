<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingTransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'incoming_transaction_details';

    protected $guarded = [];
}
