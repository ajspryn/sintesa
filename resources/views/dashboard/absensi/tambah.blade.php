@extends('dashboard.layout.main')

@section('container')

@if (request('bulan'))
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
