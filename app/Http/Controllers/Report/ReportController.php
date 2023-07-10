<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\Models\User;
use App\Models\Product;
use App\Models\Topping;
use App\Models\Ingredient;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function user_report()
    {
        return view('pages.report.user_report');
    }

    public function pdf_user_report()
    {
        $users = User::all();

        $pdf = PDF::loadView('pages.report.pdf.user_report', compact('users'))->setPaper('a4', 'potrait');

        return $pdf->download('Laporan Kasir.pdf');
    }

    public function ingredient_report()
    {
        return view('pages.report.ingredient_report');
    }

    public function pdf_ingredient_report()
    {
        $ingredients = Ingredient::all();

        $pdf = PDF::loadView('pages.report.pdf.ingredient_report', compact('ingredients'))->setPaper('a4', 'potrait');

        return $pdf->download('Laporan Bahan.pdf');
    }

    public function topping_report()
    {
        return view('pages.report.topping_report');
    }

    public function pdf_topping_report()
    {
        $toppings = Topping::all();

        $pdf = PDF::loadView('pages.report.pdf.topping_report', compact('toppings'))->setPaper('a4', 'potrait');

        return $pdf->download('Laporan Toping.pdf');
    }

    public function product_report()
    {
        return view('pages.report.product_report');
    }

    public function pdf_product_report()
    {
        $products = Product::all();

        $pdf = PDF::loadView('pages.report.pdf.product_report', compact('products'))->setPaper('a4', 'potrait');

        return $pdf->download('Laporan Produk.pdf');
    }

    public function incoming_transaction_report()
    {
        return view('pages.report.incoming_transaction_report');
    }

    public function pdf_incoming_transaction_report($fromDate, $toDate)
    {
        $transactions = Transaction::whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->where('type', 1)
            ->get();

        $pdf = PDF::loadView('pages.report.pdf.incoming_transaction_report', compact('transactions'))->setPaper('a4', 'potrait');

        return $pdf->download('Laporan Transaksi Masuk.pdf');
    }

    public function outgoing_transaction_report()
    {
        return view('pages.report.outgoing_transaction_report');
    }

    public function pdf_outgoing_transaction_report($fromDate, $toDate)
    {
        $transactions = Transaction::whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->where('type', 2)
            ->get();

        $pdf = PDF::loadView('pages.report.pdf.outgoing_transaction_report', compact('transactions'))->setPaper('a4', 'potrait');

        return $pdf->download('Laporan Transaksi Keluar.pdf');
    }
}
