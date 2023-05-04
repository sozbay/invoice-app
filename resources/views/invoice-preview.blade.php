@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0"
                        >
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                    <svg
                                        width="32"
                                        height="22"
                                        viewBox="0 0 32 22"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                            fill="#7367F0"
                                        />
                                        <path
                                            opacity="0.06"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                            fill="#161616"
                                        />
                                        <path
                                            opacity="0.06"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                            fill="#161616"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                            fill="#7367F0"
                                        />
                                    </svg>

                                    <span class="app-brand-text fw-bold fs-4"> Fatura APP </span>
                                </div>
                                <p class="mb-2">Headquarters : IDOSB Apre Sok No 9 Tuzla Istanbul Turkey

                                </p>
                                <p class="mb-2"> Free Zone Plant: Ist. End. Tic. <br>Serbest Bölge Şubesi Kurşun Cad.
                                    No:6 34953 Tuzla / Istanbul</p>
                                <p class="mb-3">+90 (216) 353 4163</p>
                            </div>
                            <div>
                                <h4 class="fw-semibold mb-2">Fatura No:{{$invoice->invoice_number}}</h4>
                                <div class="mb-2 pt-1">
                                    <span>Oluşturma Tarihi:</span>
                                    <span class="fw-semibold">{{$invoice->created_at}}</span>
                                </div>
                                <div class="pt-1">
                                    <span>Son Tarih:</span>
                                    <span class="fw-semibold">{{$invoice->due_date}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="mb-3">Müşteri Bilgileri:</h6>
                                <p class="mb-1">{{$customer->name." ".$customer->surname }}</p>
                                <p class="mb-1">{{$customer->phone }}</p>
                                <p class="mb-1">{{$customer->address }}</p>
                                <p class="mb-1">{{$customer->email }}</p>
                             </div>

                        </div>
                    </div>
                    <div class="table-responsive border-top">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Ürün Kodu</th>
                                <th>Ürün Adı</th>
                                <th>Açıklama</th>
                                <th>Birim</th>
                                <th>Birim Fiyat</th>
                                <th>Adet</th>
                                <th>İndirim</th>
                                <th>Vergi</th>
                                <th>Tutar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoiceItems as $invoiceItem)
                            <tr>
                                <td class="text-nowrap">{{$invoiceItem->product_code}}</td>
                                <td class="text-nowrap">{{$invoiceItem->product_name}}</td>
                                <td>{{$invoiceItem->description}}</td>
                                <td>{{$invoiceItem->unit}}</td>
                                <td>{{$invoiceItem->unit_amount}}</td>
                                <td>{{$invoiceItem->qty}}</td>
                                <td>%{{$invoiceItem->discount  | 0}}</td>
                                <td>%{{$invoiceItem->tax | 0}}</td>
                                <td>{{$invoiceItem->unit_price}}</td>
                             </tr>
                                @endforeach

                            <tr>
                                @if($invoice->status == 1)
                                    <td>
                                        <span class="badge bg-success"> Ödendi</span>
                                    </td>
                                @elseif($invoice->status == 2)
                                    <td>
                                        <span class="badge bg-danger"> Gecikmiş</span>

                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-warning"> Ödeme Bekleniyor</span>

                                    </td>
                                @endif
                                <td class="text-end pe-3 py-4" colspan="6">
                                    <p class="mb-2 pt-3">Ara Toplam:</p>
                                    <p class="mb-2">İndirim:</p>
                                    <p class="mb-2">Vergi:</p>
                                    <p class="mb-0 pb-3">Toplam Tutar:</p>
                                </td>
                                <td class="ps-2 py-4" colspan="2">
                                    <p class="fw-semibold mb-2 pt-3">{{$invoice->total_price + $invoice->total_discount - $invoice->total_tax}} ₺</p>
                                    <p class="fw-semibold mb-2">{{$invoice->total_discount}} ₺</p>
                                    <p class="fw-semibold mb-2">{{$invoice->total_tax}} ₺</p>
                                    <p class="fw-semibold mb-0 pb-3">{{$invoice->total_price}} ₺</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body mx-3">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-semibold">Not:</span>
                                <span
                                >{{$invoice->note}}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <a
                            href="{{route('invoice-mail',$invoice->id)}}"
                            class="btn btn-primary d-grid w-100 mb-2"
                        >
                        <span class="d-flex align-items-center justify-content-center text-nowrap"
                        ><i class="ti ti-send ti-xs me-1"></i>Fatura Gönder</span>
                        </a>

                        <a
                            class="btn btn-label-secondary d-grid w-100 mb-2"
                            target="_blank"
                            href="{{route('invoice-print',$invoice->id)}}"
                        >
                            Yazdır
                        </a>

                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header my-1">
                <h5 class="offcanvas-title">Fatura Gönder</h5>
                <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </div>

            <div class="offcanvas-body pt-0 flex-grow-1">
                <form>
                    <div class="mb-3">
                        <label for="invoice-from" class="form-label">From</label>
                        <input
                            type="text"
                            class="form-control"
                            id="invoice-from"
                            value="shelbyComapny@email.com"
                            placeholder="company@email.com"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-to" class="form-label">To</label>
                        <input
                            type="text"
                            class="form-control"
                            id="invoice-to"
                            value="qConsolidated@email.com"
                            placeholder="company@email.com"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input
                            type="text"
                            class="form-control"
                            id="invoice-subject"
                            value="Invoice of purchased Admin Templates"
                            placeholder="Invoice regarding goods"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">
Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea
                        >
                    </div>
                    <div class="mb-4">
                      <span class="badge bg-label-primary">
                        <i class="ti ti-link ti-xs"></i>
                        <span class="align-middle">Invoice Attached</span>
                      </span>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->

        <!-- Add Payment Sidebar -->
        <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
            <div class="offcanvas-header mb-3">
                <h5 class="offcanvas-title">Add Payment</h5>
                <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
                    <p class="mb-0">Invoice Balance:</p>
                    <p class="fw-bold mb-0">$5000.00</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="invoiceAmount">Payment Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input
                                type="text"
                                id="invoiceAmount"
                                name="invoiceAmount"
                                class="form-control invoice-amount"
                                placeholder="100"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="payment-date">Payment Date</label>
                        <input id="payment-date" class="form-control invoice-date" type="text" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="payment-method">Payment Method</label>
                        <select class="form-select" id="payment-method">
                            <option value="" selected disabled>Select payment method</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                        <textarea class="form-control" id="payment-note" rows="2"></textarea>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Add Payment Sidebar -->

        <!-- /Offcanvas -->
    </div>
@endsection
