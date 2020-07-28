<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function artikels(Request $request) {
        $artikels = Artikel::where('judul', 'LIKE', '%'.$request->judul.'%')->get();
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

    public function filterArtikels($kategori) {
        $artikels = Artikel::whereHas('kategoris', function ($query) use ($kategori) {
            $query->where('nama', $kategori);
        })->get();

        return response()->json($artikels);
    }
}
