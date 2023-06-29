<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingTransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'outgoing_transaction_details';

    protected $guarded = [];
}
