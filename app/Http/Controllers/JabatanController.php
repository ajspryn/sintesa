<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jabatan.index', [
            'jabatans'=>jabatan::all()
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
            'nama_jabatan'=> 'required',
            'tunjangan_jabatan'=> 'required'
        ]);
        $input = $request->all();

        jabatan::create($input);
        return redirect('/jabatan')->with('success', 'Data Jabatan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('dashboard.jabatan.edit', [
            'jabatan'=>$jabatan,
            'jabatans'=>jabatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        return $request;
        $rules= [
            'nama_jabatan'=> 'required|max:255',
            'tunjangan_jabatan'=>'required'
        ];

        $input = $request->validate($rules);

        jabatan::where('id', $jabatan->id)
                ->update($input);
        return redirect('/jabatan')->with('success', 'Data jabatan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        return $jabatan;
        jabatan::destroy($jabatan->id);
        return redirect('/jabatan')->with('success', 'Data Jabatan Berhasil Dihapus');
    }
}
