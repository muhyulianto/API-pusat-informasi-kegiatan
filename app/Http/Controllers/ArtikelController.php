<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::all();
        return view('artikel.index')->with('artikels', $artikels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = \App\Kategori::all();
        return view('artikel.create')->with('kategoris', $kategoris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        if($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->file('gambar')->getClientOriginalExtension();
            $artikel->gambar = $imageName;
            Storage::putFileAs("public", $request->file('gambar'), $imageName);
        }
        $artikel->save();

        Artikel::find($artikel->id)->kategoris()->sync($request->kategori);

        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        $artikel = Artikel::find($artikel->id);
        return view('artikel.show')->with('artikel', $artikel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        $artikel = Artikel::find($artikel->id);
        $kategoris = \App\Kategori::all();
        return view('artikel.edit')->with([
            'artikel'   => $artikel,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $artikel = Artikel::find($artikel->id);
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        if($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->file('gambar')->getClientOriginalExtension();
            $artikel->gambar = $imageName;
            Storage::putFileAs("public", $request->file('gambar'), $imageName);
        }
        $artikel->save();

        Artikel::find($artikel->id)->kategoris()->sync($request->kategori);

        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        Artikel::find($artikel->id)->delete();
        return redirect()->back();
    }
}
