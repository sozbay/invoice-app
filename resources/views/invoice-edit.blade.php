@extends('include.master')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <form class="source-item pt-4 px-0 px-sm-4 invoiceForm" action="{{route('invoice-form')}}" method="post">
            <div class="row invoice-add">
                <!-- Invoice Add-->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                    <div class="card invoice-preview-card">
                        <div class="card-body">
                            <div class="row m-sm-4 m-0">
                                <div class="col-md-7 mb-md-0 mb-4 ps-0">
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
                                    <p class="mb-2"> Free Zone Plant: Ist. End. Tic. Serbest Bölge Şubesi Kurşun Cad.
                                        No:6 34953 Tuzla / Istanbul</p>
                                    <p class="mb-3">+90 (216) 353 4163</p>
                                </div>
                                <div class="col-md-5">
                                    <dl class="row mb-2">
                                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end ps-0">
                                            <span class="h4 text-capitalize mb-0 text-nowrap">Fatura No:</span>
                                        </dt>
                                        <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                                            <div class="input-group input-group-merge disabled w-px-150">
                                                <span class="input-group-text">#</span>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    readonly
                                                    value="{{substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2) . substr(str_shuffle("0123456789"), 0, 4) }}"
                                                    id="invoiceId"
                                                    name="invoice_number"
                                                />
                                            </div>
                                        </dd>


                                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end ps-0">
                                            <span class="fw-normal">Bitiş Tarihi:</span>
                                        </dt>
                                        <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                                            <input type="text" class="form-control w-px-150 date-picker"
                                                   placeholder="YYYY-MM-DD" name="due_date" value="{{$invoice->due_date}}"/>
                                        </dd>
                                    </dl>
                                </div>
                            </div>

                            <hr class="my-3 mx-n4"/>

                            <div class="row p-sm-4 p-0">
                                <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
                                    <h6 class="mb-4">Müşteri Bilgileri:</h6>
                                    <div class="sonuc"> @foreach($customers as $customer)
                                           @if($customer->id == $invoice->customer_id)
                                               {!! $customer->name.' '.$customer->surname."<br>".$customer->phone."<br>".$customer->address!!}
                                               @endif
                                        @endforeach</div>

                                </div>

                            </div>

                            <hr class="my-3 mx-n4"/>


                            <div class="mb-3" data-repeater-list="group-a">
                                @foreach($invoiceItems as $item)
                                    <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                        <div class="d-flex border rounded position-relative pe-0">
                                            <div class="row w-100 p-3">
                                                <div class="col-md-4 col-12 mb-md-0 mb-3">
                                                    <p class="mb-2 repeater-title">Ürün</p>
                                                    <input type="text" class="form-control mb-3" placeholder="Ürün Kodu"
                                                           name="product_code" required="required" value="{{$item->product_code}}">
                                                    <input type="text" class="form-control mb-3" placeholder="Ürün Adı"
                                                           name="product_name" required="required" value="{{$item->product_name}}">
                                                    <textarea class="form-control" rows="2"
                                                              placeholder="Ürün Açıklama" name="description" required="required"> {{$item->description}} </textarea>
                                                </div>
                                                <div class="col-md-2 col-12 mb-md-0 mb-3">
                                                    <p class="mb-2 repeater-title">Birim</p>
                                                    <select class="form-select item-details mb-3 unit-select" name="unit" required="required">
                                                        <option value="" selected disabled>Birim</option>
                                                        @foreach($units as $key => $unit)
                                                            <option value="{{ $key }}" @if($item->unit === $key) selected @endif> {{ $key }} </option>
                                                        @endforeach
                                                    </select>

                                                    <div>
                                                        <span>İndirim:</span>
                                                        <span class="discount me-2">0%</span>
                                                        <span>Vergi:</span>
                                                        <span
                                                            class="tax-1 me-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Tax 1"
                                                            name="discount"
                                                        >0%</span
                                                        >

                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12 mb-md-0 mb-3">

                                                    <p class="mb-3 repeater-title">Birim Fiyat</p>
                                                    <input
                                                        type="number"
                                                        readonly
                                                        class="form-control invoice-item-qty invoice-item-unit-price"
                                                        placeholder="Birim Fiyat"
                                                        name="unit_amount"
                                                        required="required"
                                                        value="{{ $units[$item->unit] }}"
                                                    />
                                                </div>

                                                <div class="col-md-2 col-12 mb-md-0 mb-3">
                                                    <p class="mb-2 repeater-title">Adet</p>
                                                    <input
                                                        type="number"
                                                        class="form-control invoice-item-qty input-quantity"
                                                        placeholder="1"
                                                        value="{{ $item->qty }}"
                                                        min="1"
                                                        name="qty"
                                                        required="required"
                                                    />
                                                </div>
                                                <div class="col-md-2 col-12 pe-0">
                                                    <p class="mb-2 repeater-title">Tutar</p>
                                                    <input
                                                        type="number" readonly
                                                        class="form-control invoice-item-qty input-total"
                                                        required="required"
                                                        value="{{ $item->unit_price }}"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex flex-column align-items-center justify-content-between border-start p-2"
                                            >
                                                <i class="ti ti-x cursor-pointer" onclick="calculateTotal()"
                                                   data-repeater-delete></i>
                                                <div class="dropdown">
                                                    <i
                                                        class="ti ti-settings ti-xs cursor-pointer more-options-dropdown"
                                                        role="button"
                                                        id="dropdownMenuButton"
                                                        data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside"
                                                        aria-expanded="false"
                                                    >
                                                    </i>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-end w-px-300 p-3"
                                                        aria-labelledby="dropdownMenuButton"
                                                    >
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="discountInput"
                                                                       class="form-label">İndirim(%)</label>
                                                                <input
                                                                    type="number"
                                                                    class="form-control input-discount"
                                                                    id="discountInput"
                                                                    min="0"
                                                                    max="100"
                                                                    name="discount"
                                                                />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="taxInput1" class="form-label">Vergi</label>
                                                                <select name="tax" id="taxInput1"
                                                                        class="form-select tax-select input-tax">
                                                                    <option value="0" selected>0%</option>
                                                                    <option value="1">1%</option>
                                                                    <option value="18">18%</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="dropdown-divider my-3"></div>
                                                        <button type="button"
                                                                class="btn btn-label-primary btn-apply-changes apply-button">
                                                            Uygula
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row pb-4">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" data-repeater-create>Ürün Ekle
                                    </button>
                                </div>
                            </div>


                            <hr class="my-3 mx-n4"/>

                            <div class="row p-0 p-sm-4">

                                <div class="col-md-12 d-flex justify-content-end">
                                    <div class="invoice-calculations">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Tutar:</span>
                                            <span class="fw-semibold sub-total">0 ₺</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">İndirim:</span>
                                            <span class="fw-semibold discount-summary">0 ₺</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="w-px-100">Vergi:</span>
                                            <span class="fw-semibold tax-summary">0 ₺</span>
                                        </div>
                                        <hr/>
                                        <div class="d-flex justify-content-between">
                                            <span class="w-px-100">Toplam Tutar:</span>
                                            <span class="fw-semibold grand-total">{{$invoice->total_price}} ₺</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-3 mx-n4"/>

                            <div class="row px-0 px-sm-4">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="note" class="form-label fw-semibold">Not:</label>
                                        <textarea class="form-control" rows="2" id="note"
                                                  placeholder="Fatura Not" name="note">{{$invoice->note}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /Invoice Add-->

                <!-- Invoice Actions -->
                <div class="col-lg-3 col-12 invoice-actions">
                    <div class="card mb-4">
                        <div class="card-body">
                            <button
                                class="btn btn-primary d-grid w-100 mb-2"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#sendInvoiceOffcanvas"
                            >
                        <span class="d-flex align-items-center justify-content-center text-nowrap"
                        ><i class="ti ti-send ti-xs me-1"></i>Fatura Gönder</span
                        >
                            </button>
                            <button type="submit" class="btn btn-label-secondary btn-success d-grid w-100 saveButton">Fatura Kaydet
                            </button>
                        </div>
                    </div>
                    <div>
                        <p class="mb-2">Müşteri</p>
                        <select class="form-select mb-4 customerSelect" required="required" name="customer_id">
                            <option value="">Seçiniz</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}" @if($invoice->customer_id == $customer->id) selected @endif
                                data-id="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div>
                        <p class="mb-2">Fatura Durum</p>
                        <select class="form-select mb-4 customerSelect" required="required" name="status">
                            <option value="">Seçiniz</option>
                            <option value="1" @if($invoice->status == 1) selected @endif>Ödendi</option>
                            <option value="0" @if($invoice->status == 0) selected @endif>Ödeme Bekliyor</option>
                            <option value="2" @if($invoice->status == 2) selected @endif>Gecikmiş</option>

                        </select>

                    </div>
                </div>

                <!-- /Invoice Actions -->
            </div>
        </form>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header my-1">
                <h5 class="offcanvas-title">Send Invoice</h5>
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
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->

        <!-- /Offcanvas -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        const units = {!! json_encode($units) !!}
        $(document).ready(function () {
            $('.invoiceForm').submit(function() {
                // input alanlarını manuel olarak formatla
                cleave.getRawValue();
                return true;
            });
            $(".customerSelect").on("change", function () {
                const id = $(this).find(':selected').data("id");
                $.ajax({
                    type: "POST",
                    url: "{{route('get-customer')}}",
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    success: function (sonuc) {
                        $(".sonuc").html(sonuc.customer.name + " ");
                        $(".customer-id").val(sonuc.customer.id);
                        $(".sonuc").append(sonuc.customer.surname + "<br>");
                        $(".sonuc").append(sonuc.customer.phone + "<br>");
                        $(".sonuc").append(sonuc.customer.address);
                    }
                });
            });

            $(document).on("change", '.unit-select', function () {
                $(".unit-select").next('textarea').css("display", "none")
                const unit = $(this).val()
                const price = units[unit];
                const unitPrice = $(this).closest('.repeater-wrapper').find('.invoice-item-unit-price');
                const quantity = $(this).closest('.repeater-wrapper').find('.input-quantity').val();
                const total = $(this).closest('.repeater-wrapper').find('.input-total');
                let tax = $(this).closest('.repeater-wrapper').find('.input-tax').val()
                let discount = $(this).closest('.repeater-wrapper').find('.input-discount').val()

                unitPrice.val(price)
                let totalPrice = quantity * price
                if (discount) {
                    totalPrice -= (totalPrice / 100) * discount
                }
                if (tax) {
                    totalPrice += (totalPrice / 100) * tax
                }
                changeTotalPrice(total, totalPrice)
            });

            $(document).on("blur", '.input-quantity', function () {
                const quantity = $(this).val()
                const price = units[$(this).closest('.repeater-wrapper').find('.unit-select').val()];
                const total = $(this).closest('.repeater-wrapper').find('.input-total');
                let tax = $(this).closest('.repeater-wrapper').find('.input-tax').val()
                let discount = $(this).closest('.repeater-wrapper').find('.input-discount').val()

                let totalPrice = quantity * price
                if (discount) {
                    totalPrice -= (totalPrice / 100) * discount
                }
                if (tax) {
                    totalPrice += (totalPrice / 100) * tax
                }
                changeTotalPrice(total, totalPrice)
            });

            $(document).on("click", '.apply-button', function () {
                let tax = $(this).closest('.repeater-wrapper').find('.input-tax').val()
                let discount = $(this).closest('.repeater-wrapper').find('.input-discount').val()
                const unitPrice = units[$(this).closest('.repeater-wrapper').find('.unit-select').val()];
                const quantity = $(this).closest('.repeater-wrapper').find('.input-quantity').val();


                const total = $(this).closest('.repeater-wrapper').find('.input-total');

                let totalPrice = quantity * unitPrice;
                if (discount) {
                    totalPrice -= (totalPrice / 100) * discount
                }
                if (tax) {
                    totalPrice += (totalPrice / 100) * tax
                }

                changeTotalPrice(total, totalPrice)
            });

        })

        function changeTotalPrice(el, price) {
            el.val(price)
            calculateTotal()
        }

        function calculateTotal() {
            setTimeout(() => {
                let discount = 0
                let tax = 0
                let subTotal = 0
                let grandTotal = 0
                $('.repeater-wrapper').each(function () {
                    const unitPrice = units[$(this).find('.unit-select').val()] || 0
                    const quantity = $(this).find('.input-quantity').val() || 0
                    let taxVal = $(this).find('.input-tax').val()
                    let discountVal = $(this).find('.input-discount').val()
                    if (discountVal) {
                        discount += ((unitPrice * quantity) / 100) * discountVal
                    }
                    if (taxVal) {
                        tax += ((unitPrice * quantity) / 100) * taxVal
                    }

                    subTotal += unitPrice * quantity
                    grandTotal = subTotal - discount + tax
                });
                $('.sub-total').html(subTotal + ' ₺')
                $('.grand-total').html(grandTotal + ' ₺')
                $('.grand-total-input').val(grandTotal)
                $('.tax-summary').html(tax.toFixed(2) + ' ₺')
                $('.discount-summary').html(discount + ' ₺')


            }, 50)
        }

    </script>
@endsection
