<?php

namespace App\Http\Controllers;

use App\gambar;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gambar = gambar::all();
        return view('gambar.index',compact('gambar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gambar.create');
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
            'nama_gambar'=>'required|string',
            'gambar'=>'required|string'
        ]);
        $gambar = new gambar;
        $gambar->nama_gambar=$request->nama_gambar;
        $gambar->gambar=$request->gambar;
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/img/gambar';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadsuccess = $file->move($destinationPath, $filename);
            $gambar->gambar = $filename;
        }
        $gambar->save();
        return redirect()->route('gambar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function show(gambar $gambar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gambar = gambar::findOrFail($id);
        return view('gambar.edit', compact('gambar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate ([
            'nama_gambar'=>'required|string',
            'gambar'=>'required|string'
        ]);
        $gambar = gambar::findOrFail($id);
        $gambar->nama_gambar=$request->nama_gambar;
        $gambar->gambar=$request->gambar;
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/img/gambar';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadsuccess = $file->move($destinationPath, $filename);
            $gambar->gambar = $filename;
        }
        $gambar->save();
        return redirect()->route('gambar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = gambar::findOrFail($id);
        $gambar->delete();
        return redirect()->route('gambar.index');
    }
}
