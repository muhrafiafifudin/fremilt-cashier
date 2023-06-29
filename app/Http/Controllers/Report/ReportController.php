<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function user_report()
    {
        return view('pages.report.user_report');
    }

    public function ingredient_report()
    {
        return view('pages.report.ingredient_report');
    }

    public function topping_report()
    {
        return view('pages.report.topping_report');
    }

    public function product_report()
    {
        return view('pages.report.product_report');
    }

    public function incoming_transaction_report()
    {
        return view('pages.report.incoming_transaction_report');
    }

    public function outgoing_transaction_report()
    {
        return view('pages.report.outgoing_transaction_report');
    }
}
