<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Bpjs;
use App\Models\Bpjs_karyawan;
use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Karyawan;
use App\Models\Gaji_pokok;
use App\Models\Gaji;
use App\Models\Lampiran;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Models\Status_karyawan;
use Illuminate\Routing\Controller;

use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.karyawan.index', [
            'karyawans'=>karyawan::all(),
            'jabatans'=>Jabatan::all(),
            'golongans'=>Golongan::all(),
            'pendidikans'=>Pendidikan::all(),
            'status_karyawans'=>Status_karyawan::all(),
            'divisis'=>divisi::all(),
            'jumlahkaryawans' => Karyawan::all()->count(),
            'jumlahdivisi' => Divisi::all()->count(),
            'karyawantetap' => Karyawan::select('status_karyawan_id')->where('status_karyawan_id' , 1)->count(),
            'karyawankontrak' => Karyawan::select('status_karyawan_id')->where('status_karyawan_id' , 2)->count(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'foto'=> 'image',
            'nik'=> 'required',
            'nip'=> 'required',
            'nama'=> 'required',
            'alamat'=> 'required',
            'tgl_lahir'=> 'required',
            'kelamin'=> 'required',
            'pendidikan_id'=> 'required',
            'status_karyawan_id'=> 'required',
            'tgl_masuk_karyawan'=> 'required',
            'tgl_pengangkatan'=> 'required',
            'jabatan_id'=> 'required',
            'divisi_id'=> 'required',
            'golongan_id'=> 'required',
            'no_hp'=> 'required',
            'gaji_id'=> 'nullable|string',
        ]);

        $input=$request->all();

        if($request->file('foto')){
            $input['foto'] = $request->file('foto')->store('foto-karyawan');
        }

        karyawan::create($input);
        return redirect()->back()->with('success', 'Data Karyawan Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('dashboard.karyawan.lihat',[
            'karyawan'=> $karyawan,
            $id=$karyawan->id,
            'jabatans'=>Jabatan::all(),
            'golongans'=>Golongan::all(),
            'pendidikans'=>Pendidikan::all(),
            'status_karyawans'=>Status_karyawan::all(),
            'divisis'=>divisi::all(),
            'banks'=>Bank::select()->where('karyawan_id' , $id)->get(),
            'bpjs_karyawans'=>Bpjs_karyawan::select()->where('karyawan_id' , $id)->get(),
            'lampirans'=>Lampiran::select()->where('karyawan_id' , $id)->get(),

            $tahun=Carbon::now(),
            $tahun_pengangkatan = carbon::parse($karyawan->tgl_pengangkatan),
            $masa_kerja = $tahun->diffInYears($tahun_pengangkatan),
            'masa_kerjas' => $tahun->diffInYears($tahun_pengangkatan),
            $golongan = $karyawan->golongan_id,
            $gol_id = $karyawan->golongan_id.$masa_kerja,
            'gaji_id'=>$gol_id,
            'gaji_pokoks' => Gaji_pokok::select('besaran_gaji')->where('nama_golongan_id' , $golongan)->where('masa_kerja' , $masa_kerja)->get()

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('dashboard.karyawan.lihat', [
            'karyawan'=>$karyawan,
            'karyawans'=>karyawan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $rules= [
            'foto'=>'image',
            'nik'=> 'required',
            'nip'=> 'required',
            'nama'=> 'required',
            'alamat'=> 'required',
            'tgl_lahir'=> 'required',
            'kelamin'=> 'required',
            'pendidikan_id'=> 'required',
            'status_karyawan_id'=> 'required',
            'tgl_masuk_karyawan'=> 'required',
            'tgl_pengangkatan'=> 'required',
            'jabatan_id'=> 'required',
            'divisi_id'=> 'required',
            'golongan_id'=> 'required',
            'no_hp'=> 'required',
            'gaji_id' => 'required',
        ];

        $input = $request->validate($rules);

        if($request->file('foto')){
            if($request->fotolama){
                Storage::delete($request->fotolama);
            }
            $input['foto'] = $request->file('foto')->store('foto-karyawan');
        }

        Karyawan::where('id', $karyawan->id)
                ->update($input);
        return redirect()->back()->with('success', 'Data jabatan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        if($karyawan->foto){
            Storage::delete($karyawan->foto);
            }
        Karyawan::destroy($karyawan->id);
        return redirect()->back()->with('success', 'Data Karyawan Berhasil Dihapus');
    }
}
