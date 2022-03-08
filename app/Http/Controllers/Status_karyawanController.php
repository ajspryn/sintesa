<?php

namespace App\Http\Controllers;

use App\Models\Status_karyawan;
use Illuminate\Http\Request;

class Status_karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.status_karyawan.index', [
            'status_karyawans'=>Status_karyawan::all()
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
            'nama_status'=> 'required'
        ]);
        $input = $request->all();

        status_karyawan::create($input);
        return redirect('/status_karyawan')->with('success', 'Data Status Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status_karyawan  $status_karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Status_karyawan $status_karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status_karyawan  $status_karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Status_karyawan $status_karyawan)
    {
        return view('dashboard.status_karyawan.edit', [
            'status_karyawan'=>$status_karyawan,
            'status_karyawans'=>Status_karyawan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status_karyawan  $status_karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status_karyawan $status_karyawan)
    {
        $rules= [
            'nama_status'=> 'required|max:255',
        ];

        $input = $request->validate($rules);

        Status_karyawan::where('id', $status_karyawan->id)
                ->update($input);
        return redirect('/status_karyawan')->with('success', 'Data Status Karyawan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status_karyawan  $status_karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status_karyawan $status_karyawan)
    {
        Status_karyawan::destroy($status_karyawan->id);
        return redirect('/status_karyawan')->with('success', 'Data Status Karyawan Berhasil Dihapus');
    }
}
