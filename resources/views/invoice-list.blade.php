@extends('include.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Faturalar /</span> Liste</h4>
        <div class="container-xxl flex-grow-1 container-p-y">
             <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tüm Faturalar</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Faturalar ile ilgili işlemler yapabilirsiniz.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Fatura No</th>
                                    <th>Müşteri</th>
                                    <th>Tutar</th>
                                    <th>Durum</th>
                                    <th>Son Ödeme Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>

                                        <td width="200">
                                            {{$invoice->invoice_number}}
                                        </td>

                                        <td>
                                            {{$invoice->name." ".$invoice->surname}}
                                        </td>
                                        <td>
                                            {{$invoice->total_price}}
                                        </td>
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
                                        @if($invoice->due_date >= \Carbon\Carbon::now())
                                            <td>
                                                <span
                                                    class="badge rounded-pill bg-success"> {{$invoice->due_date}}</span>
                                            </td>
                                        @else
                                            <td>
                                                <span
                                                    class="badge rounded-pill bg-danger"> {{$invoice->due_date}}</span>

                                            </td>
                                        @endif
                                        <td>

                                            <a class="btn btn-sm btn-primary"
                                               href="{{route('invoice-edit',$invoice->invoiceId)}}">
                                                <i data-feather="pencil" class="me-50 ti ti-pencil"></i>

                                            </a>
                                            <a class="btn btn-sm btn-info"
                                               href="{{route('invoice-preview',$invoice->invoiceId)}}">
                                                <i data-feather="eye" class="me-10 ti ti-eye"></i>

                                            </a>
                                            <a class="btn btn-sm btn-danger" href=" ">
                                                <i data-feather="eye" class="me-10 ti ti-trash"></i>

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection
@section('script')
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
    <script src="../../assets/js/tables-datatables-basic.js"></script>
@endsection
