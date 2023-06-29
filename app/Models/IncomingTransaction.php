<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingTransaction extends Model
{
    use HasFactory;
    protected $table = 'incoming_transactions';

    protected $guarded = [];
}
