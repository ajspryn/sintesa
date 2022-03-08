<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Alert;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.divisi.index', [
            'divisis'=>divisi::all()
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
            'nama_divisi'=> 'required|max:255'
        ]);
        $input = $request->all();

        divisi::create($input);
        return redirect('/divisi')->with('success', 'Data Divisi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        return view('dashboard.divisi.edit', [
            'divisi'=>$divisi,
            'divisis'=>divisi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $rules= [
            'nama_divisi'=> 'required|max:255'
        ];

        $input = $request->validate($rules);

        divisi::where('id', $divisi->id)
                ->update($input);
        return redirect('/divisi')->with('success', 'Data Divisi Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        divisi::destroy($divisi->id);
        return redirect('/divisi')->with('success', 'Data Divisi Berhasil Dihapus');
    }
}
