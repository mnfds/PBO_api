<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $produk = produk::paginate(5);
        return response()->json([
            'data' => $produk,
        ]);
        
    }


    public function detail($id)
    {
        $data = Produk::find($id);
        return response()->json([
            'data' => $data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img_name = Str::random(10) . '.png';
        $request->file('gambar')->storeAs('public/gambar',$img_name);
        $produk = produk::create([
            'judulproduk' => $request->judulproduk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $img_name,
        ]);
        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        return response()->json([
            'data' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        $produk->judulproduk = $request->judulproduk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->gambar = $request->gambar;
        $produk->save();

        return response()->json([
            'data' => $produk,
            'status' => 'update sukses'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        $produk->delete();
        return response()->json([
            'message' => 'data dihapus'
        ]);
    }
}
