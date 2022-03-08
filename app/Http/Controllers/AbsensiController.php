<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Karyawan;
use App\Models\Gaji_pokok;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Models\Status_karyawan;
use Illuminate\Routing\Controller;

class AbsensiController extends Controller
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
            $karyawan->whereMonth('tgl_pengangkatan',request('bulan'))->whereYear('tgl_pengangkatan',request('tahun'));
        }

        return view('dashboard.absensi.index', [
            'karyawans'=>$karyawan->get(),
            'allkaryawans'=>Karyawan::all(),
            'gaji_pokoks'=>Gaji_pokok::all(),
            'jabatans'=>Jabatan::all(),
            'golongans'=>Golongan::all(),
            'pendidikans'=>Pendidikan::all(),
            'status_karyawans'=>Status_karyawan::all(),
            'divisis'=>Divisi::all(),

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
        dd($request);
            foreach ($request->id_karyawan as $id){
            $input = [
                'karyawan_id'=> $request->id_karyawan[$id],
                'bulan'=> $request->bulan[$id],
                'tahun'=> $request->tahun[$id],
                'hari_kerja'=> $request->hari_kerja[$id],
                'masuk'=> $request->masuk[$id],
                'izin'=> $request->izin[$id],
                'alfa'=> $request->alfa[$id]
            ];
            dd($input);
            Absensi::create($input);
            }
        return redirect('/absensi')->with('success', 'Data absensi bulan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
