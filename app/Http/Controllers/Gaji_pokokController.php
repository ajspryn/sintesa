<?php

namespace App\Http\Controllers;

use App\Models\Gaji_pokok;
use App\Models\Golongan;
use Illuminate\Http\Request;

class Gaji_pokokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gaji_pokok.index', [
            'gaji_pokoks'=>Gaji_pokok::all(),
            'golongans'=>Golongan::all()
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
        $request -> validate([
            'nama_golongan_id'=> 'required',
            'masa_kerja'=> 'required',
            'besaran_gaji'=> 'required'
        ]);
        $input = $request->all();

        Gaji_pokok::create($input);
        return redirect('/gaji_pokok')->with('success', 'Data Gaji Pokok Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji_pokok  $gaji_pokok
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji_pokok $gaji_pokok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji_pokok  $gaji_pokok
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji_pokok $gaji_pokok)
    {
        return view('dashboard.gaji_pokok.edit', [
            'gaji_pokok'=>$gaji_pokok,
            'gaji_pokoks'=>Gaji_pokok::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gaji_pokok  $gaji_pokok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji_pokok $gaji_pokok)
    {
        $rules= [
            'nama_golongan_id'=> 'required|max:255',
            'masa_kerja'=> 'required',
            'besaran_gaji'=>'required'
        ];

        $input = $request->validate($rules);

        Gaji_pokok::where('id', $gaji_pokok->id)
                ->update($input);
        return redirect('/gaji_pokok')->with('success', 'Data Gaji Pokok Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji_pokok  $gaji_pokok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji_pokok $gaji_pokok)
    {
        Gaji_pokok::destroy($gaji_pokok->id);
        return redirect('/gaji_pokok')->with('success', 'Data Gaji Pokok Berhasil Dihapus');
    }
}
