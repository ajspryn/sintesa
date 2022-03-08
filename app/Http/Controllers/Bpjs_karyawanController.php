<?php

namespace App\Http\Controllers;

use App\Models\Bpjs_karyawan;
use Illuminate\Http\Request;

class Bpjs_karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request -> validate([
            'karyawan_id'=> 'required',
            'jenis_bpjs'=> 'required',
            'no_bpjs'=> 'required',
            'iuran_bulanan' => 'required'
        ]);

        $input=$request->all();

        Bpjs_karyawan::create($input);
        return redirect()->back()->with('success', 'Data BPJS Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bpjs_karyawan  $bpjs_karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Bpjs_karyawan $bpjs_karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bpjs_karyawan  $bpjs_karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bpjs_karyawan $bpjs_karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bpjs_karyawan  $bpjs_karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bpjs_karyawan $bpjs_karyawan)
    {
        $rules= [
            'karyawan_id'=> 'required',
            'jenis_bpjs'=> 'required',
            'no_bpjs'=> 'required',
            'iuran_bulanan' => 'required'
        ];

        $input = $request->validate($rules);

        Bpjs_karyawan::where('id', $bpjs_karyawan->id)
                ->update($input);
        return redirect()->back()->with('success', 'Data BPJS Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bpjs_karyawan  $bpjs_karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bpjs_karyawan $bpjs_karyawan)
    {
        Bpjs_karyawan::destroy($bpjs_karyawan->id);
        return redirect()->back()->with('success', 'Data BPJS Berhasil Dihapus');
    }
}
