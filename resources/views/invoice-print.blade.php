@include('include/head')
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice-print.css') }}" />

<body><div class="invoice-print p-5">


                        <div
                            class="d-flex justify-content-between  flex-row"
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


                        <div class="row d-flex justify-content-between mb-4">
                            <div class="col-sm-6 w-50">
                                <h6 class="mb-3">Müşteri Bilgileri:</h6>
                                <p class="mb-1">{{$customer->name." ".$customer->surname }}</p>
                                <p class="mb-1">{{$customer->phone }}</p>
                                <p class="mb-1">{{$customer->address }}</p>
                                <p class="mb-1">{{$customer->email }}</p>
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
                                <td class="text-end pe-3 py-4" colspan="4">
                                    <p class="mb-2 pt-3">Ara Toplam:</p>
                                    <p class="mb-2">İndirim:</p>
                                    <p class="mb-2">Vergi:</p>
                                    <p class="mb-0 pb-3">Toplam Tutar:</p>
                                </td>
                                <td class="ps-2 py-4" colspan="2">
                                    <p class="fw-semibold mb-2 pt-3">{{$invoice->total_price + $invoice->total_discount - $invoice->total_tax}} ₺ </p>
                                    <p class="fw-semibold mb-2">{{$invoice->total_discount}} ₺</p>
                                    <p class="fw-semibold mb-2">{{$invoice->total_tax}} ₺</p>
                                    <p class="fw-semibold mb-0 pb-3">{{$invoice->total_price}} ₺</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                        <div class="row">
                            <div class="col-12">
                                <span class="fw-semibold">Not:</span>
                                <span
                                >{{$invoice->note}}</span
                                >
                            </div>


</body>
@include('include/script')
    <script src="{{ asset('assets/js/app-invoice-print.js')}}"></script>

