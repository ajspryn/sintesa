<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'nama_bank'=> 'required',
            'no_rek'=> 'required'
        ]);

        $input=$request->all();

        Bank::create($input);
        return redirect()->back()->with('success', 'Data Bank Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $rules= [
            'karyawan_id'=> 'required',
            'nama_bank'=> 'required',
            'no_rek'=> 'required'
        ];

        $input = $request->validate($rules);

        Bank::where('id', $bank->id)
                ->update($input);
        return redirect()->back()->with('success', 'Data Bank Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy($bank->id);
        return redirect()->back()->with('success', 'Data Bank Berhasil Dihapus');
    }
}
