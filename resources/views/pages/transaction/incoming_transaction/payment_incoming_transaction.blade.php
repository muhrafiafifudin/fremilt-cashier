@extends('layouts.app')

@section('title')
    Pembayaran Transaksi Masuk
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Pembayaran Transaksi Masuk
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
                                    <span class="card-label fw-bolder fs-3 mb-1">Pembayaran Transaksi Masuk</span>
                                    <span class="text-muted mt-1 fw-bold fs-7">Proses transaksi masuk yang akan dibayar</span>
                                </h3>

                                <form action="{{ url('transaksi-masuk/pembayaran/' . $transaction->id) }}" id="submit_form" method="POST">
                                    @csrf

                                    <input type="hidden" name="json" id="json_callback">
                                </form>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3 pt-10">
                                <!--begin::Input group-->
                                <div class="row g-12 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <input type="text" class="form-control form-control-solid text-center" value="{{ $transaction->name }}" disabled/>
                                    </div>
                                    <!--begin::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <select class="form-select form-select-solid text-center" data-hide-search="true" disabled >
                                            <option>{{ $transaction->payment_type == 1 ? 'Tunai' : 'Debit' }}</option>
                                        </select>
                                    </div>
                                    <!--begin::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <input type="text" class="form-control form-control-solid text-center" value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}" disabled/>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="add_incoming_transaction_table" class="table table-striped border rounded gy-5 gs-7 dataTable no-footer">
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
                                        </tfoot>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->

                                <div class="text-center">
                                    @if ($transaction->payment_type == 1)
                                        <button type="submit" class="btn btn-sm btn-light-primary mt-10 mb-10 me-5">
                                            <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Bayar Cash
                                        </button>
                                    @endif

                                    @if ($transaction->payment_type == 2)
                                        <button class="btn btn-sm btn-light-primary mt-10 mb-10 ms-5" id="pay-button">
                                            <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Bayar Debit
                                        </button>
                                    @endif
                                </div>
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
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                    send_response_to_form(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!"); console.log(result);
                    send_response_to_form(result);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                    send_response_to_form(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

        function send_response_to_form(result)
        {
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }
    </script>

    <script src="{{ asset('assets/js/pages/transaction/incoming_transaction.js') }}"></script>

    @if($message = Session::get('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success("{{ $message }}");
            })
        </script>
    @endif

    @if($message = Session::get('warning'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.warning("{{ $message }}");
            })
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.error("{{ $message }}");
            })
        </script>
    @endif
@endpush
