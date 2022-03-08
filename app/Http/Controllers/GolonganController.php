<?php

namespace App\Http\Controllers;

use App\Models\Gaji_pokok;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.golongan.index', [
            'golongans'=>golongan::all(),
            'gaji_pokoks'=>Gaji_pokok::all()
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
            'nama_golongan_id'=> 'required'
        ]);
        $input = $request->all();

        Golongan::create($input);
        return redirect('/golongan')->with('success', 'Data Golongan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        return view('dashboard.golongan.edit', [
            'golongan'=>$golongan,
            'golongans'=>Golongan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        $rules= [
            'nama_golongan_id'=> 'required|max:255'
        ];

        $input = $request->validate($rules);

        Golongan::where('id', $golongan->id)
                ->update($input);
        return redirect('/golongan')->with('success', 'Data golongan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        Golongan::destroy($golongan->id);
        return redirect('/golongan')->with('success', 'Data Golongan Berhasil Dihapus');
    }
}
