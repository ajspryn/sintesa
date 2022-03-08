<?php

namespace App\Http\Controllers;

use App\Models\Lampiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LampiranController extends Controller
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
            'nama_lampiran'=> 'required',
            'file_lampiran'=> 'required'
        ]);

        $input=$request->all();

        if($request->file('file_lampiran')){
            $input['file_lampiran'] = $request->file('file_lampiran')->store('file-lampiran-karyawan');
        }

        Lampiran::create($input);
        return redirect()->back()->with('success', 'Data Dokumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lampiran  $lampiran
     * @return \Illuminate\Http\Response
     */
    public function show(Lampiran $lampiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lampiran  $lampiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Lampiran $lampiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lampiran  $lampiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lampiran $lampiran)
    {
        $rules= [
            'karyawan_id'=> 'required',
            'nama_lampiran'=> 'required',
            'file_lampiran'=> 'required'
        ];

        $input = $request->validate($rules);

        if($request->file('file_lampiran')){
            if($request->file_lampiranlama){
                Storage::delete($request->file_lampiranlama);
            }
            $input['file_lampiran'] = $request->file('file_lampiran')->store('file-lampiran-karyawan');
        }

        Lampiran::where('id', $lampiran->id)
                ->update($input);
        return redirect()->back()->with('success', 'Data Dokumen Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lampiran  $lampiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lampiran $lampiran)
    {
        if($lampiran->file_lampiran){
            Storage::delete($lampiran->file_lampiran);
            }
        Lampiran::destroy($lampiran->id);
        return redirect()->back()->with('success', 'Data Dokumen Berhasil Dihapus');
    }
}
