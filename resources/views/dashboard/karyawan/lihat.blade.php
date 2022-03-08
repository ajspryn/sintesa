@extends('dashboard.layout.main')

@section('container')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        @if ($karyawan->foto)
                                        <img
                                        class="img-fluid rounded mt-3 mb-2"
                                        src="{{ asset('storage/'.$karyawan->foto) }}"
                                        alt="User Avatar"
                                        width="110"
                                        height="110"
                                        />
                                        @else
                                        <div class="img-fluid rounded mt-3 mb-2">
                                            <span class="avatar-content">
                                                <i data-feather="user" class="font-medium-5" alt="User Avatar" width="110" height="110"></i>
                                            </span>
                                        </div>
                                        @endif
                                        <div class="user-info text-center">
                                            <h4>{{ $karyawan->nama }}</h4>
                                            <span class="badge bg-light-success">{{ $karyawan->jabatan->nama_jabatan }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around my-2 pt-75">
                                    {{-- <div class="d-flex align-items-start me-2">
                                        <span class="badge bg-light-primary p-75 rounded">
                                            <i data-feather="check" class="font-medium-2"></i>
                                        </span>
                                        <div class="ms-75">
                                            <h4 class="mb-0">1.23k</h4>
                                            <small>Tasks Done</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <span class="badge bg-light-primary p-75 rounded">
                                            <i data-feather="briefcase" class="font-medium-2"></i>
                                        </span>
                                        <div class="ms-75">
                                            <h4 class="mb-0">568</h4>
                                            <small>Projects Done</small>
                                        </div>
                                    </div> --}}
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">NIK :</span>
                                            <span>{{ $karyawan->nik }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">NIP :</span>
                                            <span>{{ $karyawan->nip }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Alamat :</span>
                                            <span >{{ $karyawan->alamat }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Tgl Lahir :</span>
                                            <span>{{ carbon\carbon::parse($karyawan->tgl_lahir)->format("d/m/Y") }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Jenis Kelamin :</span>
                                            <span>{{ $karyawan->kelamin }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Pendidikan :</span>
                                            <span>{{ $karyawan->pendidikan->nama_pendidikan }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status Karyawan :</span>
                                            <span class="badge bg-light-primary">{{ $karyawan->status_karyawan->nama_status }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Tgl Masuk :</span>
                                            <span>{{ carbon\carbon::parse($karyawan->tgl_masuk_karyawan)->format("d/m/Y") }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Tgl Pengangkatan :</span>
                                            <span>{{ carbon\carbon::parse($karyawan->tgl_pengangkatan)->format("d/m/Y") }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Jabatan :</span>
                                            <span>{{ $karyawan->divisi->nama_divisi }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Golongan :</span>
                                            <span>{{ $karyawan->golongan_id }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">No Hp :</span>
                                            <span>{{ $karyawan->no_hp }}</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center pt-2">
                                        <a href="/karyawan/{{ $karyawan->id }}/edit" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                                            Edit
                                        </a>
                                        <form action="/karyawan/{{ $karyawan->id }}" method="post" class="d-inline" >
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger me-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')" ><span>Hapus</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <!-- Tabs with Icon starts -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tab with icon</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a
                                        class="nav-link active"
                                        id="gajiicon-tab"
                                        data-bs-toggle="tab"
                                        href="#gaji"
                                        role="tab"
                                        aria-selected="false"
                                        ><i data-feather="dollar-sign"></i> Gaji</a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                        class="nav-link"
                                        id="rekeningbpjsicon-tab"
                                        data-bs-toggle="tab"
                                        href="#rekeningbpjs"
                                        role="tab"
                                        aria-selected="false"
                                        ><i data-feather="credit-card"></i>Rekening & BPJS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                        class="nav-link"
                                        id="dokumenicon-tab"
                                        data-bs-toggle="tab"
                                        href="#dokumen"
                                        role="tab"
                                        aria-selected="false"
                                        ><i data-feather="file-text"></i>Dokumen</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="gaji" role="tabpanel">
                                        <div class="card-body">
                                            <hr>
                                            <h6 class="card-title text-center">Pendapatan</h6>
                                            <div class="row">
                                                <div class="col-xl-12 col-12">
                                                    <dl class="row mb-0">
                                                        @foreach ($gaji_pokoks as $gaji)
                                                        @if ($gaji->besaran_gaji)
                                                        <dt class="col-sm-4 fw-bolder mb-1">Gaji Pokok</dt>
                                                        <dd class="col-sm-8 mb-1">: @rupiah($gaji->besaran_gaji)</dd>
                                                        @else
                                                        <dt class="col-sm-4 fw-bolder mb-1">Gaji Pokok</dt>
                                                        <dd class="col-sm-8 mb-1">: </dd>
                                                        @endif
                                                        @endforeach

                                                        @if ($karyawan->jabatan->tunjangan_jabatan)
                                                        <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Jabatan</dt>
                                                        <dd class="col-sm-8 mb-1">: @rupiah($karyawan->jabatan->tunjangan_jabatan) </dd>
                                                        @else
                                                        <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Jabatan</dt>
                                                        <dd class="col-sm-8 mb-1">: </dd>
                                                        @endif

                                                        <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Transport</dt>
                                                        <dd class="col-sm-8 mb-1">: {{ $karyawan->golongan_id }}{{ $masa_kerjas }}</dd>

                                                        <dt class="col-sm-4 fw-bolder mb-1"> </dt>
                                                        <dd class="col-sm-8 mb-1"> </dd>

                                                        <dt class="col-sm-8 fw-bolder mb-1"></dt>
                                                        <dd class="col-sm-4 fw-bolder mb-1">Total : @rupiah($gaji->besaran_gaji + $karyawan->jabatan->tunjangan_jabatan)</dd>
                                                    </dl>
                                                </div>
                                            </div>

                                            <hr>
                                            <h6 class="card-title text-center">Pemotongan</h6>
                                            {{-- <div class="row">
                                                <div class="col-xl-12 col-12">
                                                    <dl class="row mb-0">
                                                        @foreach ( as )
                                                        @if ()
                                                        <dt class="col-sm-4 fw-bolder mb-1">Gaji Pokok</dt>
                                                        <dd class="col-sm-8 mb-1">: </dd>
                                                        @else
                                                        <dt class="col-sm-4 fw-bolder mb-1">Gaji Pokok</dt>
                                                        <dd class="col-sm-8 mb-1">:</dd>
                                                        @endif
                                                        @endforeach

                                                        @if ()
                                                        <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Jabatan</dt>
                                                        <dd class="col-sm-8 mb-1">: </dd>
                                                        @else
                                                        <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Jabatan</dt>
                                                        <dd class="col-sm-8 mb-1">:</dd>
                                                        @endif

                                                        <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Transport</dt>
                                                        <dd class="col-sm-8 mb-1">: </dd>

                                                        <dt class="col-sm-4 fw-bolder mb-1"> </dt>
                                                        <dd class="col-sm-8 mb-1"> </dd>

                                                        <dt class="col-sm-8 fw-bolder mb-1"></dt>
                                                        <dd class="col-sm-4 fw-bolder mb-1">Total : </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-0">
                                                <dt class="col-sm-7 fw-bolder mt-0 mb-0"></dt>
                                                <dd class="col-sm-5 fw-bolder mt-0 mb-0">Total Bersih : </dd>
                                            </div>
                                            <hr> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="rekeningbpjs" role="tabpanel">

                                        <!-- rekening -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-50">Akun Bank</h4>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNewCard">
                                                    <i data-feather="plus"></i>
                                                    <span>Tambah Data</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($banks as $bank)
                                                <div class="added-cards">
                                                    <div class="cardMaster rounded border p-2 mb-1">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <div class="card-information">
                                                                <img
                                                                class="mb-1 img-fluid"
                                                                src="../../../app-assets/images/icons/payments/mastercard.png"
                                                                alt="Master Card"
                                                                />
                                                                <div class="d-flex align-items-center mb-50">
                                                                    <h6 class="mb-0">{{ $karyawan->nama }}</h6>
                                                                </div>
                                                                <span class="card-number">{{ $bank->no_rek }}</span>
                                                                <div class="d-flex align-items-center mb-50">
                                                                    <h6 class="mb-0">{{ $bank->nama_bank }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column text-start text-lg-end">
                                                                <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                                    <button class="btn btn-outline-primary me-75" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                        <i data-feather='edit'></i>
                                                                    </button>
                                                                    <form action="/bank/{{ $bank->id }}" method="post" class="d-inline" >
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')" ><span><i data-feather='trash-2'></i></span></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- / rekening -->

                                        <!-- bpjs -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-50">BPJS</h4>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahbpjs">
                                                    <i data-feather="plus"></i>
                                                    <span>Tambah Data</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($bpjs_karyawans as $bpjs)
                                                <div class="added-cards">
                                                    <div class="cardMaster rounded border p-2 mb-1">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <div class="card-information">
                                                                @if ($bpjs->jenis_bpjs == 'Kesehatan')
                                                                <img
                                                                class="mb-1 img-fluid"
                                                                src="../../../app-assets/images/logo/kes.png"
                                                                width="100px" height="100px"
                                                                />
                                                                @else
                                                                <img
                                                                class="mb-1 img-fluid"
                                                                src="../../../app-assets/images/logo/tk.png"
                                                                width="100px" height="100px"
                                                                />
                                                                @endif

                                                                <div class="d-flex align-items-center mb-50">
                                                                    <h4 class="mb-0">{{ $bpjs->no_bpjs }}</h4>
                                                                </div>
                                                                <span class="card-number">{{ $bpjs->karyawan->nama }}</span>
                                                                <div class="d-flex align-items-center mb-50">
                                                                    <h6 class="mb-0"></h6>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column text-start text-lg-end">
                                                                <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                                    <button class="btn btn-outline-primary me-75" data-bs-toggle="modal" data-bs-target="#editbpjs">
                                                                        <i data-feather='edit'></i>
                                                                    </button>
                                                                    <form action="/bpjs_karyawan/{{ $bpjs->id }}" method="post" class="d-inline" >
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')" ><span><i data-feather='trash-2'></i></span></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- / bpjs -->

                                    </div>
                                    <div class="tab-pane" id="dokumen"  role="tabpanel">

                                        <!-- Lampiran -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-50">Lampiran Dokumen</h4>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahlampiran">
                                                    <i data-feather="plus"></i>
                                                    <span>Tambah Data</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($lampirans as $lampiran)
                                                <div class="added-cards">
                                                    <div class="cardMaster rounded border p-2 mb-1">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <div class="card-information">
                                                                <div class="d-flex align-items-center mb-50">
                                                                    <h2 class="mb-0">{{ $lampiran->nama_lampiran }}</h2>
                                                                </div>
                                                                <div>
                                                                    <span class="card-number">Dibuat Pada : {{ $lampiran->created_at }}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="card-number">Diperbarui  : {{ $lampiran->updated_at }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column text-start text-lg-end">
                                                                <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                                    <a href="{{ asset('storage/' . $lampiran->file_lampiran) }}" class="btn btn-outline-primary me-75" type="button" target="_blank">
                                                                        <i data-feather='eye'></i>
                                                                    </a>
                                                                    <button class="btn btn-outline-primary me-75" data-bs-toggle="modal" data-bs-target="#editlampiran">
                                                                        <i data-feather='edit'></i>
                                                                    </button>
                                                                    <form action="/lampiran/{{ $lampiran->id }}" method="post" class="d-inline" >
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')" ><span><i data-feather='trash-2'></i></span></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- / Lampiran -->

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Tabs with Icon ends -->
                    </div>
                    <!--/ User Content -->
                </div>
            </section>

            <!-- tambah bpjs  -->
            <div class="modal fade" id="tambahbpjs" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h1 class="text-center mb-1" id="addNewCardTitle">Add New Card</h1>
                            <p class="text-center">Add card for future billing</p>

                            <!-- form -->
                            <form method="post" action="/bpjs_karyawan" class="row gy-1 gx-2 mt-75">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardNumber">Nomor BPJS</label>
                                    <div class="input-group">
                                        <input
                                        id="modalAddCardNumber"
                                        name="karyawan_id"
                                        class="form-control"
                                        type="hidden"
                                        value="{{ $karyawan->id }}"
                                        data-msg="Please enter your credit card number"
                                        />
                                        <input
                                        id="modalAddCardNumber"
                                        name="no_bpjs"
                                        class="form-control"
                                        type="text"
                                        data-msg="Please enter"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" class="d-block">Jenis BPJS</label>
                                    <div class="form-check my-50">
                                        <input
                                        type="radio"
                                        id="validationRadio3"
                                        name="jenis_bpjs"
                                        class="form-check-input"
                                        value="Kesehatan"
                                        checked
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio3">Kesehatan</label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                        type="radio"
                                        id="validationRadio4"
                                        name="jenis_bpjs"
                                        class="form-check-input"
                                        value="Ketenagakerjaan"
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio4">Ketenagakerjaan</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardNumber">Iuran Bulanan</label>
                                    <div class="input-group">
                                        <input
                                        id="modalAddCardNumber"
                                        name="iuran_bulanan"
                                        class="form-control"
                                        type="number"
                                        data-msg="Please enter"
                                        />
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ tambah bpjs  -->

            <!-- edit bpjs  -->
            <div class="modal fade" id="editbpjs" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h1 class="text-center mb-1" id="addNewCardTitle">Add New Card</h1>
                            <p class="text-center">Add card for future billing</p>
                            @foreach ($bpjs_karyawans as $bpjs)
                            <!-- form -->
                            <form method="post" action="/bpjs_karyawan/{{ $bpjs->id }}" class="row gy-1 gx-2 mt-75">
                                @csrf
                                @method('put')
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardNumber">Nomor BPJS</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id" value="{{ $bpjs->id }}" />
                                        <input
                                        id="modalAddCardNumber"
                                        name="karyawan_id"
                                        class="form-control"
                                        type="hidden"
                                        value="{{ $bpjs->karyawan_id }}"
                                        />
                                        <input
                                        id="modalAddCardNumber"
                                        name="no_bpjs"
                                        class="form-control"
                                        type="text"
                                        data-msg="Please enter your credit card number"
                                        value="{{ $bpjs->no_bpjs }}"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" class="d-block">Jenis BPJS</label>
                                    @if (old('jenis_bpjs' , $bpjs->jenis_bpjs) == 'Kesehatan')
                                    <div class="form-check my-50">
                                        <input
                                        type="radio"
                                        id="validationRadio3"
                                        name="jenis_bpjs"
                                        class="form-check-input"
                                        value="Kesehatan"
                                        checked
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio3">Kesehatan</label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                        type="radio"
                                        id="validationRadio4"
                                        name="jenis_bpjs"
                                        class="form-check-input"
                                        value="Ketenagakerjaan"
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio4">Ketenagakerjaan</label>
                                    </div>
                                    @else

                                    <div class="form-check my-50">
                                        <input
                                        type="radio"
                                        id="validationRadio3"
                                        name="jenis_bpjs"
                                        class="form-check-input"
                                        value="Kesehatan"
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio3">Kesehatan</label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                        type="radio"
                                        id="validationRadio4"
                                        name="jenis_bpjs"
                                        class="form-check-input"
                                        value="Ketenagakerjaan"
                                        checked
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio4">Ketenagakerjaan</label>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--/ edit bpjs  -->

            <!-- tambah lampiran  -->
            <div class="modal fade" id="tambahlampiran" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div></div>
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Edit User Information</h1>
                                <p>Updating user details will receive a privacy audit.</p>
                            </div>
                            <form method='post' class="row gy-1 pt-75" action="/lampiran" enctype="multipart/form-data" >
                                @csrf
                                <div>
                                    <input
                                    type="hidden"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    name="karyawan_id"
                                    value="{{ $karyawan->id }}"
                                    required
                                    />
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label" for="basic-icon-default-post">Nama Lampiran</label>
                                    <input
                                    type="text"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    placeholder="Nama"
                                    name="nama_lampiran"
                                    required
                                    />
                                </div>
                                <div class="col-6">
                                    <label for="file" class="form-label">Simple file input</label>
                                    <input class="form-control" type="file" id="file" name='file_lampiran'/>
                                </div>
                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ tambah lampiran  -->

            <!-- edit lampiran  -->
            <div class="modal fade" id="editlampiran" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div></div>
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Edit User Information</h1>
                                <p>Updating user details will receive a privacy audit.</p>
                            </div>
                            @foreach ($lampirans as $lampiran)
                            <form method='post' class="row gy-1 pt-75" action="/lampiran/{{ $lampiran->id }}" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div>
                                    <input
                                    type="hidden"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    name="karyawan_id"
                                    value="{{ old('basic-icon-default-post' , $karyawan->id) }}"
                                    required
                                    />
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label" for="basic-icon-default-post">Nama Lampiran</label>
                                    <input
                                    type="text"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    placeholder="Nama"
                                    name="nama_lampiran"
                                    value="{{ old('basic-icon-default-post' , $lampiran->nama_lampiran) }}"
                                    required
                                    />
                                </div>
                                <div class="col-6">
                                    <label for="file" class="form-label">Simple file input</label>
                                    <input class="form-control" type="hidden" id="file" name='file_lampiranlama' value="{{ old('file' , $lampiran->file_lampiran) }}"/>
                                    <input class="form-control" type="file" id="file" name='file_lampiran'/>
                                </div>
                                <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--/ edit lampiran  -->

            <!-- tambah rekening  -->
            <div class="modal fade" id="addNewCard" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h1 class="text-center mb-1" id="addNewCardTitle">Add New Card</h1>
                            <p class="text-center">Add card for future billing</p>

                            <!-- form -->
                            <form method="post" action="/bank" class="row gy-1 gx-2 mt-75">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardNumber">Nomor Rekening</label>
                                    <div class="input-group">
                                        <input
                                        id="modalAddCardNumber"
                                        name="no_rek"
                                        class="form-control"
                                        type="text"
                                        data-msg="Please enter your credit card number"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="nama_bank">Nama Bank</label>
                                    <input type="hidden" id="karyawan_id" class="form-control" value="{{ $karyawan->id }}" name="karyawan_id" />
                                    <input type="text" id="nama_bank" class="form-control" placeholder="Nama Bank" name="nama_bank" />
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ tambah rekening  -->

            <!-- edit rekekning  -->
            <div class="modal fade" id="editCard" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h1 class="text-center mb-1" id="editCardTitle">Edit Card</h1>
                            <p class="text-center">Edit your saved card details</p>
                            @foreach ($banks as $bank)
                            <!-- form -->
                            <form method="POST" action="/bank/{{ $bank->id }}" class="row gy-1 gx-2 mt-75">
                                @csrf
                                @method('put')
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardNumber">Nomor Rekening</label>
                                    <div class="input-group">
                                        <input
                                        id="modalAddCardNumber"
                                        name="no_rek"
                                        class="form-control"
                                        type="text"
                                        value="{{ old('modalAddCardNumber' , $bank->no_rek ) }}"
                                        data-msg="Please enter your credit card number"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="nama_bank">Nama Bank</label>
                                    <input type="hidden" id="karyawan_id" class="form-control" value="{{ old('karyawan_id' , $bank->karyawan_id ) }}" name="karyawan_id" />
                                    <input type="text" id="nama_bank" class="form-control" value="{{ old('nama_bank' , $bank->nama_bank ) }}" placeholder="Nama Bank" name="nama_bank" />
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--/ edit rekening  -->

            <!-- Edit karyawan -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div></div>
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Edit User Information</h1>
                                <p>Updating user details will receive a privacy audit.</p>
                            </div>
                            <form method='post' class="row gy-1 pt-75" action="/karyawan/{{ $karyawan->id }}" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="basic-icon-default-post">NIK</label>
                                    <input
                                    type="text"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    placeholder="NIK"
                                    name="nik"
                                    value="{{ old('nik' , $karyawan->nik) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="basic-icon-default-post">NIP</label>
                                    <input
                                    type="text"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    placeholder="NIP"
                                    name="nip"
                                    value="{{ old('nip' , $karyawan->nip) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                                    <input
                                    type="text"
                                    class="form-control dt-full-name"
                                    id="basic-icon-default-fullname"
                                    placeholder="Nama"
                                    name="nama"
                                    value="{{ old('nama' , $karyawan->nama) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="city-column">Alamat</label>
                                    <input
                                    type="text"
                                    id="city-column"
                                    class="form-control"
                                    placeholder="Alamat"
                                    name="alamat"
                                    value="{{ old('alamat' , $karyawan->alamat) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="fp-default">Tgl Lahir</label>
                                    <input
                                    type="text"
                                    class="form-control flatpickr-basic"
                                    id="fp-default"
                                    placeholder="MM/DD/YYYY"
                                    name="tgl_lahir"
                                    value="{{ old('tgl_lahir' , carbon\carbon::parse($karyawan->tgl_lahir)->format("d/m/Y")) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" class="d-block">Jenis Kelamin</label>
                                    @if (old('kelamin' , $karyawan->kelamin) == 'Pria')
                                    <div class="form-check my-50">
                                        <input
                                        type="radio"
                                        id="validationRadio3"
                                        name="kelamin"
                                        class="form-check-input"
                                        value="Pria"
                                        checked
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio3">Pria</label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                        type="radio"
                                        id="validationRadio4"
                                        name="kelamin"
                                        class="form-check-input"
                                        value="Wanita"
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio4">Wanita</label>
                                    </div>
                                    @else
                                    <div class="form-check my-50">
                                        <input
                                        type="radio"
                                        id="validationRadio3"
                                        name="kelamin"
                                        class="form-check-input"
                                        value="Pria"
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio3">Pria</label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                        type="radio"
                                        id="validationRadio4"
                                        name="kelamin"
                                        class="form-check-input"
                                        value="Wanita"
                                        checked
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio4">Wanita</label>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="pendidikan">Pendidikan Terahir</label>
                                    <select class="form-select" id="pendidikan" name="pendidikan_id" required>
                                        @foreach ( $pendidikans as $pendidikan )
                                        @if (old('pendidikan_id' , $karyawan->pendidikan_id) == $pendidikan->id)
                                        <option value="{{ $pendidikan->id }}" selected>{{ $pendidikan->nama_pendidikan }}</option>
                                        @else
                                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama_pendidikan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select">Status Karyawan</label>
                                    <select class="form-select" id="select" name="status_karyawan_id" required>
                                        @foreach ( $status_karyawans as $status )
                                        @if (old('status_karyawan_id' , $karyawan->status_karyawan_id) == $status->id)
                                        <option value="{{ $status->id }}" selected>{{ $status->nama_status }}</option>
                                        @else
                                        <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="fp-default">Tgl Masuk Karyawan</label>
                                    <input
                                    type="text"
                                    class="form-control flatpickr-basic"
                                    id="fp-default"
                                    placeholder="MM/DD/YYYY"
                                    name="tgl_masuk_karyawan"
                                    value="{{ old('tgl_masuk_kayawan' , carbon\carbon::parse($karyawan->tgl_masuk_karyawan)->format("d/m/Y")) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="fp-default">Tgl Pengangkatan Karyawan Tetap</label>
                                    <input
                                    type="text"
                                    class="form-control flatpickr-basic"
                                    id="fp-default"
                                    placeholder="MM/DD/YYYY"
                                    name="tgl_pengangkatan"
                                    value="{{ old('tgl_pengangkatan' , carbon\carbon::parse($karyawan->tgl_pengangkatan)->format("d/m/Y")) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select">Jabatan</label>
                                    <select class="form-select" id="select" name="jabatan_id" required>
                                        @foreach ( $jabatans as $jabatan )
                                        @if ( old('jabatan_id' , $karyawan->jabatan_id) == $jabatan->id )
                                        <option value="{{ $jabatan->id }}" selected>{{ $jabatan->nama_jabatan }}</option>
                                        @else
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label" for="select">Divisi</label>
                                    <select class="form-select" id="select" name="divisi_id" required>
                                        @foreach ( $divisis as $divisi )
                                        @if (old('divisi_id' , $karyawan->divisi_id) == $divisi->id)
                                        <option value="{{ $divisi->id }}" selected>{{ $divisi->nama_divisi }}</option>
                                        @else
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label" for="select">Golongan</label>
                                    <select class="form-select" id="select" name="golongan_id" required>
                                        @foreach ( $golongans as $golongan )
                                        @if (old('golongan_id' , $karyawan->golongan_id) == $golongan->nama_golongan_id)
                                        <option value="{{ $golongan->nama_golongan_id }}" selected>{{ $golongan->nama_golongan_id }}</option>
                                        @else
                                        <option value="{{ $golongan->nama_golongan_id }}">{{ $golongan->nama_golongan_id }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label" for="contact-info-icon">No Hp</label>
                                    <input
                                    type="number"
                                    id="contact-info-icon"
                                    class="form-control"
                                    placeholder="No Hp"
                                    name="no_hp"
                                    value="{{ old('alamat' , $karyawan->no_hp) }}"
                                    required
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="foto" class="form-label">Simple file input</label>
                                    <input class="form-control" type="hidden" id="foto" name='fotolama' value="{{ old('foto' , $karyawan->foto) }}"/>
                                    <input class="form-control" type="file" id="foto" name='foto'/>
                                </div>
                                <input
                                    type="hidden"
                                    id="gaji_id"
                                    class="form-control"
                                    name="gaji_id"
                                    value="{{ $gaji_id }}"
                                    required
                                    />
                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit karyawan -->
        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
