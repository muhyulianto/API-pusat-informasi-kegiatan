<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function artikels() {
        $artikels = Artikel::all();
        return response()->json($artikels);
    }

    public function artikelDetail($id) {
        $artikel = Artikel::find($id);
        return response()->json($artikel);
    }

    public function kategoris() {
        $kategoris = Kategori::all();
        return response()->json($kategoris);
    }

    public function cariArtikels(Request $request) {
        $artikels = Artikel::where('judul', 'LIKE', '%'.$request->judul.'%')->get();
        return response()->json($artikels);
    }

    public function filterArtikels(Request $request) {
        $artikels = Artikel::whereHas('kategoris', function ($query) use ($request) {
            $query->where('nama', $request->kategori);
        })->get();

        return response()->json($artikels);
    }
}
