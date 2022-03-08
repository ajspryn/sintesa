@extends('dashboard.layout.main')

@section('container')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ $jumlahkaryawans}}</h3>
                                        <span>Jumlah Karyawan</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ $karyawantetap }}</h3>
                                        <span>Karyawan Tetap</span>
                                    </div>
                                    <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ $karyawankontrak }}</h3>
                                        <span>Karyawan Kontrak</span>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ $jumlahdivisi }}</h3>
                                        <span>Jumlah Divisi</span>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                            <i data-feather="users" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends -->

                <div class="content-header-left text-md-end col-md-12 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser"><i data-feather='plus'> </i><span> Tambah Data</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic table -->
        <section class="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>NIK</th>
                                    <th>NIP</th>
                                    <th style="width: 270px">Nama</th>
                                    <th>Divisi</th>
                                    <th>Status Karyawan</th>
                                    <th>Golongan</th>
                                    <th>Tgl Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Tgl Masuk Karyawan</th>
                                    <th>Tgl Pengangkatan</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawans as $karyawan )
                                <tr>
                                    <td></td>
                                    <td>{{ $karyawan->nik }}</td>
                                    <td>{{ $karyawan->nip }}</td>
                                    <td style="width: 500px">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-50">
                                                @if ($karyawan->foto)
                                                <img
                                                src="{{ asset('storage/' .$karyawan->foto) }}"
                                                alt="Avatar"
                                                width="50"
                                                height="50"
                                                href="/karyawan/{{ $karyawan->id }}"
                                                />
                                                @else
                                                <div class="avatar bg-light-primary p-50">
                                                    <span class="avatar-content">
                                                        <i data-feather="user" class="font-medium-5"></i>
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="more-info">
                                                <h6 class="mb-0">{{ $karyawan->nama }}</h6>
                                                <p class="mb-0">( {{ $karyawan->jabatan->nama_jabatan }} )</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $karyawan->divisi->nama_divisi }}</td>
                                    <td>{{ $karyawan->status_karyawan->nama_status }}</td>
                                    <td>{{ $karyawan->golongan_id }}</td>
                                    <td>{{ carbon\carbon::parse($karyawan->tgl_lahir)->format("d/m/Y") }}</td>
                                    <td>{{ $karyawan->kelamin }}</td>
                                    <td>{{ $karyawan->pendidikan->nama_pendidikan }}</td>
                                    <td>{{ carbon\carbon::parse($karyawan->tgl_masuk_karyawan)->format("d/m/Y") }}</td>
                                    <td>{{ carbon\carbon::parse($karyawan->tgl_pengangkatan)->format("d/m/Y") }}</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                    <td>{{ $karyawan->no_hp }}</td>
                                    <td>
                                        <a href="/karyawan/{{ $karyawan->id }}" type="button" class="btn btn-icon btn-flat-success">
                                            <span>Lihat</span>
                                        </a>
                                        <form action="/karyawan/{{ $karyawan->id }}" method="post" class="d-inline" >
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-icon btn-flat-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')" ><span>Hapus</span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Edit User Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Edit User Information</h1>
                                <p>Updating user details will receive a privacy audit.</p>
                            </div>
                            <form method='post' class="row gy-1 pt-75" action="/karyawan" enctype="multipart/form-data" >
                                @csrf
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="basic-icon-default-post">NIK</label>
                                    <input
                                    type="text"
                                    class="form-control dt-post"
                                    id="basic-icon-default-post"
                                    placeholder="NIK"
                                    name="nik"
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
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" class="d-block">Jenis Kelamin</label>
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
                                        required
                                        />
                                        <label class="form-check-label" for="validationRadio4">Wanita</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="pendidikan">Pendidikan Terahir</label>
                                    <select class="form-select" id="pendidikan" name="pendidikan_id" required>
                                        <option value="">Pilih Pendidikan</option>
                                        @foreach ( $pendidikans as $pendidikan )
                                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama_pendidikan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Benar</div>
                                    <div class="invalid-feedback">Silahkan Pilih Pendidikan</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select">Status Karyawan</label>
                                    <select class="form-select" id="select" name="status_karyawan_id" required>
                                        <option value="">Pilih Status</option>
                                        @foreach ( $status_karyawans as $status )
                                        <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
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
                                    required
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select">Jabatan</label>
                                    <select class="form-select" id="select" name="jabatan_id" required>
                                        <option value="">Pilih Jabatan</option>
                                        @foreach ( $jabatans as $jabatan )
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select</div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label" for="select">Divisi</label>
                                    <select class="form-select" id="select" name="divisi_id" required>
                                        <option value="">Pilih Divisi</option>
                                        @foreach ( $divisis as $divisi )
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select</div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label" for="select">Golongan</label>
                                    <select class="form-select" id="select" name="golongan_id" required>
                                        <option value="">Pilih Golongan</option>
                                        @foreach ( $golongans as $golongan )
                                        <option value="{{ $golongan->nama_golongan_id }}">{{ $golongan->nama_golongan_id }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select</div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label" for="contact-info-icon">No Hp</label>
                                    <input
                                    type="number"
                                    id="contact-info-icon"
                                    class="form-control"
                                    placeholder="No Hp"
                                    name="no_hp"
                                    required
                                    />
                                </div>
                                <input
                                    type="hidden"
                                    id="gaji_id"
                                    class="form-control"
                                    name="gaji_id"
                                    />
                                <div class="col-12">
                                    <label for="foto" class="form-label">Simple file input</label>
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
    </section>
    <!--/ Basic table -->

</div>
</div>
</div>
<!-- END: Content-->
@endsection

