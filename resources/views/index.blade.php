@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-header">Fatura Adeti</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-files ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h4 class="mb-0 text-white">{{$totalInvoices}}</h4>
                                <small>Adet</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-info text-white mb-3">
                    <div class="card-header">Toplam Fatura Tutarı</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h4 class="mb-0 text-white">{{$totalPrice}}₺</h4>
                                <small>TL</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-success text-white mb-3">
                    <div class="card-header">Ödenen Fatura Tutarı</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-check ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h4 class="mb-0 text-white">{{$paymentTotalPrice}}₺</h4>
                                <small>TL</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-danger text-white mb-3">
                    <div class="card-header">Ödenmemiş Fatura Tutarı</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-help ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h4 class="mb-0 text-white">{{$notPaymentTotalPrice}}₺</h4>
                                <small>TL</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
