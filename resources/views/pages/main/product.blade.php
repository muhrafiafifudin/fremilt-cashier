@extends('layouts.app')

@section('title')
    Produk
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Produk
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Halaman Produk</small>
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
                                    <span class="card-label fw-bolder fs-3 mb-1">Produk</span>
                                    <span class="text-muted mt-1 fw-bold fs-7">Menampilkan semua produk yang ada</span>
                                </h3>
                                <div class="card-toolbar">
                                    <div class="button-add">
                                        <a href="" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#modal_add_product">
                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Tambah Produk</a>
                                    </div>
                                </div>

                                <!--begin::Modal - New Target-->
                                <div class="modal fade" id="modal_add_product" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content rounded">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--begin::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body px-10 px-lg-15 pt-0 pb-15">
                                                <!--begin::Heading-->
                                                <div class="mb-13 text-center">
                                                    <h1 class="mb-3">TAMBAH PRODUK</h1>
                                                    <div class="text-gray-400 fw-bold fs-5">Form Untuk Penambahan Data Produk</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Scroll-->
                                                <div class="scroll-y me-n7 pe-7" id="kt_modal_new_target_form" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                                    <!--begin:Form-->
                                                    <form class="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('POST')

                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">Gambar</label>
                                                            <input type="file" class="form-control form-control-solid" name="image" required />
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">Nama Produk</label>
                                                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Produk" name="product" required />
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">Kategori</label>
                                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kategori" name="category_id">
                                                                <option value="">Pilih Kategori</option>

                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">Harga</label>
                                                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Harga Produk" name="price" required />
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">Total Produk</label>
                                                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Total Produk" name="stock" required />
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-8">
                                                            <label class="fs-6 fw-bold mb-2">Deskripsi</label>
                                                            <textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Masukkan Deskripsi"></textarea>
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Actions-->
                                                        <div class="text-center mt-5">
                                                            <button type="reset" class="btn btn-white me-3" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        <!--end::Actions-->
                                                    </form>
                                                    <!--end:Form-->
                                                </div>
                                                <!--end::Scroll-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Target-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3 pt-10">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="product_table" class="table table-striped border rounded gy-5 gs-7 dataTable no-footer">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th>No.</th>
                                                <th>Gambar</th>
                                                <th>Nama Produk</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Total Produk</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <img src="{{ asset('assets/media/product/' . $product->image) }}" alt="{{ $product->product }}" width="100px">
                                                    </td>
                                                    <td>{{ $product->product }}</td>
                                                    <td class="text-center">Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                                                    <td class="text-center">{{ $product->stock }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('product.destroy', \Crypt::encrypt($product->id)) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <a href="#" class="btn btn-icon btn-active-color-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#modal_edit_product_{{ $product->id }}" >
                                                                <!--begin::Svg Icon | path: icons/stockholm/Communication/Write.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <button type="button" class="btn btn-icon btn-active-color-primary btn-sm delete-data" title="Hapus">
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
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->

                                    @foreach ($products as $product)
                                        <!--begin::Modal - New Target-->
                                        <div class="modal fade" id="modal_edit_product_{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content rounded">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                                        <!--begin::Close-->
                                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                            <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                                        <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--begin::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body px-10 px-lg-15 pt-0 pb-15">
                                                        <!--begin::Heading-->
                                                        <div class="mb-10 text-center">
                                                            <h1 class="mb-3">EDIT PRODUK</h1>
                                                            <div class="text-gray-400 fw-bold fs-5">Form Untuk Mengubah Data Produk</div>
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Scroll-->
                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_target_form" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                                            <!--begin:Form-->
                                                            <form class="form" action="{{ route('product.update', \Crypt::encrypt($product->id)) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-5 fv-row">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">Gambar</label>
                                                                    <input type="file" class="form-control form-control-solid" name="image" value=""/>
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-5 fv-row">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">Nama Produk</label>
                                                                    <input type="text" class="form-control form-control-solid" name="product" value="{{ $product->product }}" />
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-5 fv-row">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">Kategori</label>
                                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kategori" name="category_id">
                                                                        <option value="">Pilih Kategori</option>

                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-5 fv-row">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">Harga</label>
                                                                    <input type="text" class="form-control form-control-solid" name="price" value="{{ $product->price }}"/>
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-5 fv-row">
                                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">Total Produk</label>
                                                                    <input type="text" class="form-control form-control-solid" name="stock" value="{{ $product->stock }}"/>
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-8">
                                                                    <label class="fs-6 fw-bold mb-2">Deskripsi</label>
                                                                    <textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Masukkan Deskripsi">{{ $product->description }}</textarea>
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Actions-->
                                                                <div class="text-center mt-10">
                                                                    <button type="reset" class="btn btn-white me-3" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                                <!--end::Actions-->
                                                            </form>
                                                            <!--end:Form-->
                                                        </div>
                                                        <!--end::Scroll-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal - New Target-->
                                    @endforeach
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
    <script src="{{ asset('assets/js/pages/main/product.js') }}"></script>

    @if($message = Session::get('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success("{{ $message }}");
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
