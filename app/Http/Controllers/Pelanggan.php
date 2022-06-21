<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\pelanggan as ModelsPelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class Pelanggan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = ModelsPelanggan::all();
        $pelanggans = ModelsPelanggan::all();
        $golongan = golongan::all();
        $user = User::all();
        return view('Pelanggan', compact('golongan', 'user', 'pelanggan', 'pelanggans'));
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
        $pel = new ModelsPelanggan();
        $pel->id_golongans = $request->id_golongans;
        $pel->pel_no = $request->pel_no;
        $pel->pel_nama = $request->pel_nama;
        $pel->pel_alamat = $request->pel_alamat;
        $pel->pel_no_hp = $request->pel_no_hp;
        $pel->pel_ktp = $request->pel_ktp;
        $pel->pel_seri = $request->pel_seri;
        $pel->user_id = $request->user_id;
        $pel->pel_aktif = 1;
        $pel->pel_status = 'Y';
        $pel->save();

        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pel = ModelsPelanggan::find($id);
        $pel->id_golongans = $request->id_golongans;
        $pel->pel_no = $request->pel_no;
        $pel->pel_nama = $request->pel_nama;
        $pel->pel_alamat = $request->pel_alamat;
        $pel->pel_no_hp = $request->pel_no_hp;
        $pel->pel_ktp = $request->pel_ktp;
        $pel->pel_seri = $request->pel_seri;
        $pel->user_id = $request->user_id;
        $pel->pel_aktif = $request->pel_aktif;
        $pel->pel_status = $request->pel_status;;
        $pel->update();

        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pel = ModelsPelanggan::find($id);
        $pel->delete($pel);

        return redirect()->route('pelanggan.index');
    }
}
