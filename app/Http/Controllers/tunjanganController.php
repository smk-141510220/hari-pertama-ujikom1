<?php

namespace App\Http\Controllers;
use App\tunjanganModel;
use App\golonganModel;
use App\jabatanModel;


use Illuminate\Http\Request;

class tunjangancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tunjangan=tunjanganModel::all();
        return view('tunjangan.index',compact('tunjangan'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $golongan=golonganModel::all();
        $jabatan=jabatan::all();
        return view('tunjangan.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $tunjangan= new tunjangan;
        $tunjangan->kode_tunjangan=$request->get('kode_tunjangan');
        $tunjangan->id_jabatan=$request->get('id_jabatan');
        $tunjangan->id_golongan=$request->get('id_golongan');
        $tunjangan->status=$request->get('status');
        $tunjangan->jumlah_anak=$request->get('jumlah_anak');
        $tunjangan->besaran_uang=$request->get('besaran_uang');
        $tunjangan->save();
        return redirect('/tunjangan');
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
        $tunjangan=tunjanganModel::find($id);
        $golongan=golonganModel::all();
        $jabatan=jabatanModel::all();
        return view('tunjangan.edit',compact('tunjangan','jabatan','golongan'));
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
        //
        $tunjanganupdate=Request::all();
        $tunjangan=tunjanganModel::find($i);
        $tunjangan->update($tunjanganupdate);
        return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        tunjanganModel::find($id)->delete();
        return redirect ('tunjangan');
    }
}
