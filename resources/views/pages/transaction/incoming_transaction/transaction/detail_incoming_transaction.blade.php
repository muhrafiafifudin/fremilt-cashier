@extends('layouts.app')

@section('title')
    Detail Transaksi Masuk
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="d-flex align-items-center me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Detail Transaksi Masuk
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Halaman Utama</small>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Detail Transaksi Masuk</span>
                                    <span class="text-muted mt-1 fw-bold fs-7">Detail transaksi Masuk</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3 pt-10 mb-15">
                                <!--begin::Input group-->
                                <div class="row g-12 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <input type="text" class="form-control form-control-solid text-center" value="{{ $transaction->name }}" disabled/>
                                    </div>
                                    <!--begin::Col-->
                                    <!--begin::Col-->
                                    {{-- <div class="col-md-4 fv-row">
                                        <select class="form-select form-select-solid text-center" data-hide-search="true" disabled >
                                            <option>{{ $transaction->payment_type == 1 ? 'Tunai' : 'Debit' }}</option>
                                        </select>
                                    </div> --}}
                                    <!--begin::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <input type="text" class="form-control form-control-solid text-center" value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}" disabled/>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="add_outgoing_transaction_table" class="table table-striped border rounded gy-5 gs-7 dataTable no-footer">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th>No.</th>
                                                <th>Nama Produk</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; $subTotal = 0; @endphp
                                            @foreach ($transaction_details as $transaction_detail)
                                                <tr class="product-data">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $transaction_detail->product->product }}</td>
                                                    <td align="center">Rp. {{ number_format($transaction_detail->product->price, 2, ',', '.') }}</td>
                                                    <td align="center">{{ $transaction_detail->product_qty }} pcs</td>
                                                    <td align="center">Rp. {{ number_format($transaction_detail->product->price * $transaction_detail->product_qty, 2, ',', '.') }}</td>
                                                </tr>

                                                @php
                                                    $subTotal += $transaction_detail->product->price * $transaction_detail->product_qty;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th colspan="4">Total</th>
                                                <th class="text-center">Rp. {{ number_format($subTotal, 2, ',', '.') }}</th>
                                            </tr>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th colspan="4">Bayar</th>
                                                <th class="text-center">Rp. {{ number_format($payment->payment, 2, ',', '.') }}</th>
                                            </tr>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th colspan="4">Kembalian</th>
                                                <th class="text-center">Rp. {{ number_format($payment->money_change, 2, ',', '.') }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Body-->
                        </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('assets/js/pages/transaction/outgoing_transaction.js') }}"></script>
@endpush
