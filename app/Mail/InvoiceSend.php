<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceSend extends Mailable
{
    use Queueable, SerializesModels;

    public Invoice $invoice;

    public $invoiceItems;

    public $customer;

    public $subject = 'Fatura bilgisi!';

    /**
     * Create a new message instance.
     * @param Invoice $invoice
     * @param InvoiceItems $items
     * @param Customer $customer
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->invoiceItems = $invoice->invoiceItems;
        $this->customer = $invoice->customer;
    }


    /**
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('invoice-print');
    }

}
