<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceSend;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function list()
    {
        $invoices = Invoice::query()->join('customer', 'customer_id', '=', 'customer.id')->select('invoice.id as invoiceId', 'invoice.*', 'customer.*')->get()->all();
        return view('invoice-list', ['invoices' => $invoices]);
    }

    public function add()
    {

        $customers = Customer::all();
        $units = [
            'Adet' => 1.2,
            'KG' => 2.5,
            'Koli' => 4.5,
            'Metre' => 0.5

        ];
        return view('invoice-add', ['customers' => $customers, 'units' => $units]);
    }

    public function edit($id)
    {
        $customers = Customer::all();
        $units = [
            'Adet' => 1.2,
            'KG' => 2.5,
            'Koli' => 4.5,
            'Metre' => 0.5

        ];
        $invoice = Invoice::query()->where('invoice.id', $id)->with('invoiceItems')->first();
        return view('invoice-edit', ['customers' => $customers, 'units' => $units, 'invoice' => $invoice, 'invoiceItems' => $invoice->invoiceItems]);
    }

    public function print($id)
    {

        $invoice = Invoice::query()->where('invoice.id', $id)->with('invoiceItems')->with('customer')->first();
        return view('invoice-print', ['invoice' => $invoice, 'invoiceItems' => $invoice->invoiceItems, 'customer' => $invoice->customer]);
    }

    public function preview($id)
    {

        $invoice = Invoice::query()->where('invoice.id', $id)->with('invoiceItems')->with('customer')->first();
        return view('invoice-preview', ['invoice' => $invoice, 'invoiceItems' => $invoice->invoiceItems, 'customer' => $invoice->customer]);
    }

    public function getCustomer(Request $request)
    {
        $customerId = $request->input('id');
        $customer = Customer::query()->where('id', $customerId)->first();
        return response()->json(['customer' => $customer]);
    }

    public function invoiceForm(Request $request)
    {
        $invoice = new Invoice();
        $invoice->customer_id = $request->input('customer_id');
        $invoice->invoice_number = $request->input('invoice_number');
        $invoice->total_price = $request->input('total_price');
        $invoice->total_tax = $request->input('total_tax');
        $invoice->total_discount = $request->input('total_discount');
        $invoice->note = $request->input('note');
        $invoice->due_date = $request->input('due_date');
        $invoice->save();

        $invoiceId = $invoice->id;
        foreach ($request->input("group-a") as $invoiceItems) {
            $invoiceItem = new InvoiceItems();
            $invoiceItem->invoice_id = $invoiceId;
            $invoiceItem->product_code = $invoiceItems['product_code'];
            $invoiceItem->product_name = $invoiceItems['product_name'];
            $invoiceItem->unit = $invoiceItems['unit'];
            $invoiceItem->unit_amount = $invoiceItems['unit_amount'];
            $invoiceItem->unit_price = $invoiceItems['unit_price'];
            $invoiceItem->qty = $invoiceItems['qty'];
            $invoiceItem->tax = @$invoiceItems['tax'];
            $invoiceItem->discount = @$invoiceItems['discount'];
            $invoiceItem->description = $invoiceItems['description'];
            $invoiceItem->save();

        }

        return redirect()->back()->with('success', 'Fatura Başarılı Bir Şekilde Kayıt Edildi!');

    }

    public function sendInvoice($id)
    {
        /**
         * @var $invoice Invoice
         */
        $invoice = Invoice::query()->where('invoice.id', $id)->with('invoiceItems')->with('customer')->first();
        Mail::to([$invoice->customer->email])->send(new InvoiceSend($invoice));


        return redirect()->back()->with('success', 'Mail Gönderildi!');
    }
}
