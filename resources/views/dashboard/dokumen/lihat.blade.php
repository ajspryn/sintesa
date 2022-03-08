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
                        <!-- User Pills -->
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('karyawan*')? "active":"" }}" href="/karyawan/{{ $karyawan->id }}">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Account</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('karyawan*')? "active":"" }}">
                                <a class="nav-link" href="/dokumen/{{ $karyawan->id }}">
                                    <i data-feather="file-text" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Dokumen</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-billing.html">
                                    <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Rekening & BPJS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-notifications.html">
                                    <i data-feather="bell" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Bonus</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-user-view-connections.html">
                                    <i data-feather="link" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Connections</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ User Pills -->

                        <!-- Billing Address -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-50">Data Gaji</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-12">
                                        <dl class="row mb-0">
                                            @foreach ($gaji_pokoks as $gaji)
                                            @if ($gaji->besaran_gaji)
                                            <dt class="col-sm-4 fw-bolder mb-1">Gaji Pokok</dt>
                                            <dd class="col-sm-8 mb-1">: {{ $gaji->besaran_gaji }}</dd>
                                            @else
                                            <dt class="col-sm-4 fw-bolder mb-1">Gaji Pokok</dt>
                                            <dd class="col-sm-8 mb-1">:</dd>
                                            @endif
                                            @endforeach

                                            @if ($karyawan->jabatan->tunjangan_jabatan)
                                            <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Jabatan</dt>
                                            <dd class="col-sm-8 mb-1">: {{ $karyawan->jabatan->tunjangan_jabatan }}</dd>
                                            @else
                                            <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Jabatan</dt>
                                            <dd class="col-sm-8 mb-1">:</dd>
                                            @endif

                                            <dt class="col-sm-4 fw-bolder mb-1">Tunjangan Transport</dt>
                                            <dd class="col-sm-8 mb-1">: {{ $masa_kerjas }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1"></dt>
                                            <dd class="col-sm-8 mb-1">SDF754K77</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Billing Address:</dt>
                                            <dd class="col-sm-8 mb-1">100 Water Plant Avenue, Building 1303 Wake Island</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Billing Address -->
                    </div>
                    <!--/ User Content -->
                </div>
            </section>

            <!-- Edit User Modal -->
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
                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->
        </div>
    </div>
</div>
<!-- END: Content-->

@endsection


