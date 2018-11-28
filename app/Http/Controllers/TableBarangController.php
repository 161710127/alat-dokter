<?php

namespace App\Http\Controllers;

use App\table_barang;
use App\kategori;
use Illuminate\Http\Request;

class TableBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table_barang = table_barang::with('kategori')->get();
        return view('table_barang.index',compact('table_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('table_barang.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'=>'required|string',
            'kategori_id'=>'required|string',
            'gambar'=>'required|string',
            'deskripsi'=>'required|string'
        ]);
        $table_barang = new table_barang;
        $table_barang->nama_barang=$request->nama_barang;
        $table_barang->kategori_id=$request->kategori_id;
        $table_barang->gambar=$request->gambar;
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/img/gambar';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadsuccess = $file->move($destinationPath, $filename);
            $gambar->gambar = $filename;
        }
        $table_barang->deskripsi=$request->deskripsi;
        $table_barang->save();
        return redirect()->route('table_barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\table_barang  $table_barang
     * @return \Illuminate\Http\Response
     */
    public function show(table_barang $table_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\table_barang  $table_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table_barang = table_barang::findOrFail($id);
        $kategori = kategori::all();
        $selectedkategori = table_barang::findOrFail($id)->kategori_id;
        return view('table_barang.edit', compact('table_barang','kategori','selectedkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\table_barang  $table_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate ([
            'nama_barang'=>'required|string',
            'kategori_id'=>'required|string',
            'gambar'=>'required|string',
            'deskripsi'=>'required|string'
        ]);
        $table_barang = table_barang::findOrFail($id);
        $table_barang->nama_barang=$request->nama_barang;
        $table_barang->kategori_id=$request->kategori_id;
        $table_barang->gambar=$request->gambar;
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/img/gambar';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadsuccess = $file->move($destinationPath, $filename);
            $gambar->gambar = $filename;
        }
        $table_barang->deskripsi=$request->deskripsi;
        $table_barang->save();
        return redirect()->route('table_barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\table_barang  $table_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table_barang = table_barang::findOrFail($id);
        $table_barang->delete();
        return redirect()->route('table_barang.index');
    }
}
