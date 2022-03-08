@extends('dashboard.layout.main')

@section('container')

@if (request('bulan') && $karyawans->count())
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <!-- Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <form class="form" href="/lihat_gaji">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="bulan">Bulan</label>
                                            <select class="form-select" id="bulan" name="bulan" required>
                                                <option></option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="tahun">Tahun</label>
                                            <input
                                            type="number"
                                            id="tahun"
                                            name="tahun"
                                            class="form-control"
                                            placeholder="Tahun"
                                            value={{ request('tahun') }}
                                            required
                                            />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-mb-2 col-12 ">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->

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
                                    <th style="width: 270px">Nama</th>
                                    <th>Divisi</th>
                                    <th>Status Karyawan</th>
                                    <th>Golongan</th>
                                    <th>Gaji Pokok</th>
                                    <th>UMT Harian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawans as $karyawan )
                                <tr>
                                    <td></td>
                                    <td>{{ $karyawan->nik }}</td>
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
                                    <td>@if ($karyawan->gaji_id)
                                        @rupiah($karyawan->gaji->besaran)
                                        @else
                                        @rupiah(0)
                                        @endif
                                    </td>
                                    <td>@rupiah($karyawan->jabatan->tunjangan_jabatan)</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Basic table -->
    </div>
</div>
<!-- END: Content-->
@elseif (request('bulan'))
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <!-- Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <form class="form" href="/lihat_gaji">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="bulan">Bulan</label>
                                            <select class="form-select" id="bulan" name="bulan" required>
                                                <option></option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="tahun">Tahun</label>
                                            <input
                                            type="number"
                                            id="tahun"
                                            name="tahun"
                                            class="form-control"
                                            placeholder="Tahun"
                                            value={{ request('tahun') }}
                                            required
                                            />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-mb-2 col-12 ">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->
        <!-- Style variation -->
<section id="card-style-variation">
  <!-- Solid -->
  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="card bg-warning text-white">
        <div class="card-body">
          <h4 class="card-title text-center text-white">Anda Belum Memasukan Data Absensi Bulan ini</h4>
          <p class="card-text text-center">Silakan Input Terlebih Dahulu Data Absensi Di Menu Absensi</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Style variation -->
    </div>
</div>
<!-- END: Content-->
@else
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <!-- Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <form class="form" href="/lihat_gaji">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="bulan">Bulan</label>
                                            <select class="form-select" id="bulan" name="bulan" required>
                                                <option></option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="tahun">Tahun</label>
                                            <input
                                            type="number"
                                            id="tahun"
                                            name="tahun"
                                            class="form-control"
                                            placeholder="Tahun"
                                            value={{ request('tahun') }}
                                            required
                                            />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-mb-2 col-12 ">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->
    </div>
</div>
<!-- END: Content-->
@endif


@endsection
