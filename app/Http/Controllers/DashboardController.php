<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $totalInvoices = $invoices->count();
        $totalPrice = 0;
        $paymentTotalPrice = 0;
        $notPaymentTotalPrice = 0;
        foreach ($invoices as $invoice) {
            if ($invoice->status == 1) {
                $paymentTotalPrice += $invoice->total_price;
            } elseif ($invoice->status == 2 || $invoice->status == 0 ) {
                $notPaymentTotalPrice += $invoice->total_price;
            }
            $totalPrice += $invoice->total_price;
        }
        return view('index', ['totalPrice' => $totalPrice, 'totalInvoices' => $totalInvoices, 'paymentTotalPrice' => $paymentTotalPrice, 'notPaymentTotalPrice' => $notPaymentTotalPrice]);
    }
}
