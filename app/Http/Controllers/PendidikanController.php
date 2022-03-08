<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pendidikan.index', [
            'pendidikans'=>Pendidikan::all()
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
            'nama_pendidikan'=> 'required'
        ]);
        $input = $request->all();

        Pendidikan::create($input);
        return redirect('/pendidikan')->with('success', 'Data Pendidikan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        return view('dashboard.pendidikan.edit', [
            'pendidikan'=>$pendidikan,
            'pendidikans'=>Pendidikan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $rules= [
            'nama_pendidikan'=> 'required|max:255',
        ];

        $input = $request->validate($rules);

        Pendidikan::where('id', $pendidikan->id)
                ->update($input);
        return redirect('/pendidikan')->with('success', 'Data pendidikan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        Pendidikan::destroy($pendidikan->id);
        return redirect('/pendidikan')->with('success', 'Data Pendidikan Berhasil Dihapus');
    }
}
