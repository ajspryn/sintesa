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
                                <li class="breadcrumb-item"><a href="/pendidikan">Pengaturan </a>
                                </li>
                                <li class="breadcrumb-item active"> Edit Pendidikan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i data-feather='plus'> </i><span> Tambah Data</span></button>
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
                    <!-- Basic multiple Column Form section start -->
                    <section id="multiple-column-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Multiple Column</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method='post' action="/pendidikan/{{ $pendidikan->id }}">
                                            @csrf
                                            @method('put')
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="itemname">Nama Pendidikan</label>
                                                        <input type="text" class="form-control @error('nama_pendidikan') is-invalid @enderror" id="itemname" placeholder="Nama Pendidikan" name="nama_pendidikan" value="{{ old('nama_pendidikan' , $pendidikan->nama_pendidikan) }}"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-12 text-center mt-2 pt-50">
                                                    <button type="submit" class="btn btn-success btn-next">
                                                        <span class="align-middle d-sm-inline-block d-none">Edit</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

