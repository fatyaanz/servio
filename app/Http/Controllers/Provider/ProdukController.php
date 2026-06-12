<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{

    // =========================
    // INDEX
    // =========================

    public function index(Request $request)
    {

        $query = Produk::query();

        // SEARCH

        if($request->search){

            $query->where(
                'nama_produk',
                'like',
                '%' . $request->search . '%'
            );

        }

        $produks = $query->latest()->paginate(5);

        return view(
            'provider.pages.produk.produk',
            compact('produks')
        );

    }

    // =========================
    // STORE
    // =========================

    public function store(Request $request)
    {

        $request->validate([

            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',

        ]);

        $foto = null;

        if($request->hasFile('foto')){

            $foto = $request->file('foto')
                ->store('produk','public');

        }

        Produk::create([

            'nama_produk' => $request->nama_produk,
            'foto' => $foto,
            'harga' => str_replace('.', '', $request->harga),
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'deskripsi' => $request->deskripsi,

        ]);

        return back();

    }

    // =========================
    // UPDATE
    // =========================

    public function update(Request $request, $id)
    {

        $produk = Produk::findOrFail($id);

        $foto = $produk->foto;

        if($request->hasFile('foto')){

            $foto = $request->file('foto')
                ->store('produk','public');

        }

        $produk->update([

            'nama_produk' => $request->nama_produk,
            'foto' => $foto,
            'harga' => str_replace('.', '', $request->harga),
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'deskripsi' => $request->deskripsi,

        ]);

        return back();

    }

    // =========================
    // DELETE
    // =========================

    public function destroy($id)
    {

        Produk::findOrFail($id)->delete();

        return back();

    }

}