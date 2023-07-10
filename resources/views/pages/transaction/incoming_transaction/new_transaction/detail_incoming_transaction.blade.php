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
                                    <span class="text-muted mt-1 fw-bold fs-7">Menampilkan detail transaksi masuk yang diperlukan</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3 pt-10">
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
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; $subTotal = 0; @endphp
                                            @foreach ($transaction as $data)
                                                <tr class="product-data">
                                                    <td>{{ $no++ }}</td>
                                                    {{-- <td>{{ $data->product->product }}</td> --}}
                                                    {{-- <td align="center">Rp. {{ number_format($data->product->price, 2, ',', '.') }}</td> --}}
                                                    <td align="center">
                                                        {{-- <input type="hidden" class="product-id" value="{{ $data->product_id }}"> --}}

                                                        <!--begin::Dialer-->
                                                        <div class="position-relative w-lg-200px m-0-auto" id="kt_modal_create_project_budget_setup" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="{{ $data->product->stock }}" data-kt-dialer-step="1" data-kt-dialer-suffix=" pcs">
                                                            <!--begin::Decrease control-->
                                                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0 lessQuantity" data-kt-dialer-control="decrease">
                                                                <!--begin::Svg Icon | path: icons/stockholm/Code/Minus.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                                        <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                            <!--end::Decrease control-->
                                                            <!--begin::Input control-->
                                                            <input type="text" class="form-control form-control-solid border-0 text-center qty-input" data-kt-dialer-control="input" placeholder="Amount" readonly="readonly" value="{{ $data->product_qty }}" />
                                                            <!--end::Input control-->
                                                            <!--begin::Increase control-->
                                                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0 addQuantity" data-kt-dialer-control="increase">
                                                                <!--begin::Svg Icon | path: icons/stockholm/Code/Plus.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                                        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                            <!--end::Increase control-->
                                                        </div>
                                                        <!--end::Dialer-->
                                                    </td>
                                                    <td align="center">Rp. {{ number_format($data->product->price * $data->product_qty, 2, ',', '.') }}</td>
                                                    <td align="center">
                                                        <input type="hidden" class="product-id" value="{{ $data->product_id }}">

                                                        <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-data-cart" title="Hapus">
                                                            <!--begin::Svg Icon | path: icons/stockholm/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                    </td>
                                                </tr>

                                                @php
                                                    $subTotal += $data->product->price * $data->product_qty;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th colspan="4">Total</th>
                                                <th class="text-center">Rp. {{ number_format($subTotal, 2, ',', '.') }}</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-light-primary mt-10 mb-10">
                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Tambah Transaksi Masuk
                                    </button>
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
