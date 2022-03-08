<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Gaji;
use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Karyawan;
use App\Models\Lampiran;
use App\Models\Gaji_pokok;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Models\Bpjs_karyawan;
use App\Models\Status_karyawan;
use Illuminate\Routing\Controller;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan=Karyawan::latest();

        if (request('bulan')) {
            $karyawan->where('tgl_pengangkatan','like','%'.request('bulan').'%')->where('tgl_pengangkatan','like','%'.request('tahun').'%');
        }

        return view('dashboard.data_gaji.index', [
            'karyawans'=>$karyawan->get(),
            'gaji_pokoks'=>Gaji_pokok::all(),
            'jabatans'=>Jabatan::all(),
            'golongans'=>Golongan::all(),
            'pendidikans'=>Pendidikan::all(),
            'status_karyawans'=>Status_karyawan::all(),
            'divisis'=>divisi::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        return view('dashboard.karyawan.lihat',[
            'karyawans'=>Karyawan::all(),
            'jabatans'=>Jabatan::all(),
            'golongans'=>Golongan::all(),
            'pendidikans'=>Pendidikan::all(),
            'status_karyawans'=>Status_karyawan::all(),
            'divisis'=>divisi::all(),
            'banks'=>Bank::all(),
            'bpjs_karyawans'=>Bpjs_karyawan::all(),
            'lampirans'=>Lampiran::all(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        //
    }
}
