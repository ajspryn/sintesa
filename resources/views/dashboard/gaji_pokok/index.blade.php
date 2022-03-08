@extends('dashboard.layout.main')

@section('container')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Pengaturan Data</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Data</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/gaji_pokok">Pengaturan </a>
                                </li>
                                <li class="breadcrumb-item active"> Gaji Pokok
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser"><i data-feather='plus'> </i><span> Tambah Data</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('jabatan*')? "active":"" }}" href="/jabatan">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Jabatan</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('divisi*')? "active":"" }}" href="/divisi">
                                <i data-feather="users" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Divisi</span>
                            </a>
                        </li>
                        <!-- billing and plans -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('golongan*')? "active":"" }}" href="/golongan">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Golongan</span>
                            </a>
                        </li>
                        <!-- notification -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pendidikan*')? "active":"" }}" href="/pendidikan">
                                <i data-feather="award" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Pendidikan</span>
                            </a>
                        </li>
                        <!-- connection -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('Status_karyawan*')? "active":"" }}" href="/status_karyawan">
                                <i data-feather="user-check" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Status</span>
                            </a>
                        </li>
                        <!-- connection -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('gaji_pokok*')? "active":"" }}" href="/gaji_pokok">
                                <i data-feather="credit-card" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Gaji Pokok</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Golongan</th>
                                                <th>Masa Kerja</th>
                                                <th>Besaran Gaji</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gaji_pokoks as $gaji_pokok )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $gaji_pokok->nama_golongan_id }}</td>
                                                <td>{{ $gaji_pokok->masa_kerja }}</td>
                                                <td>@rupiah($gaji_pokok->besaran_gaji)</td>
                                                <td>
                                                    <a href="/gaji_pokok/{{ $gaji_pokok->id }}/edit" type="button" class="btn btn-icon btn-flat-warning">
                                                        <span>Edit</span>
                                                    </a>
                                                    <form action="/gaji_pokok/{{ $gaji_pokok->id }}" method="post" class="d-inline" >
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
                                        <form method='post' action="/gaji_pokok">
                                            @csrf
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-5 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="select">Golongan</label>
                                                        <select class="form-select" id="select" name="nama_golongan_id" required>
                                                            <option value="">Pilih Golongan</option>
                                                            @foreach ( $golongans as $golongan )
                                                            <option value="{{ $golongan->nama_golongan_id }}">{{ $golongan->nama_golongan_id }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="itemname">Masa Kerja</label>
                                                        <input type="number" class="form-control" id="itemname" placeholder="Tahun" name="masa_kerja" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-5 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="itemcost">Besaran Gaji</label>
                                                        <input type="number" class="form-control" id="itemcost" placeholder="Rp." name="besaran_gaji" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-12 text-center mt-2 pt-50">
                                                    <button type="submit" class="btn btn-success btn-next">
                                                        <span class="align-middle d-sm-inline-block d-none">Submit</span>
                                                    </button>
                                                </div>
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
</div>
<!-- END: Content-->
@endsection

