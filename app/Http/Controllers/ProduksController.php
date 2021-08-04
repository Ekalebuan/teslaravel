<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;

class ProduksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acktive = 'Produk';
        $produk = Produk::all();
        return view('produk.list', compact('produk','acktive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acktive = 'Produk';
        $awal = 'PRD';
        

        $produks = DB::table('produks')->select(DB::raw('MAX(RIGHT(kode_produk,12)) as kd_max'))->get();
        if ($produks->count()>0) {
            foreach ($produks as $key ) {
                $tmp = ((int)$key->kd_max)+1;
                $kode = $awal.sprintf("%012s",$tmp);
            }
        }else {
            $kode = $awal."000000000001";
        }

        return view('produk.create', compact('kode','acktive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        Produk::create($request->all());
        return redirect('/produk')->with('status', 'Data produk berhasil ditambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $acktive = 'Produk';
        return view('produk.edit', compact('produk','acktive') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        //

        Produk::where('kode_produk', $produk->kode_produk)
                    ->update([
                        'nama_produk'   => $request->nama_produk,
                        'harga'         => $request->harga
                    ]);

        return redirect('/produk')->with('status', 'Data produk berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
        // $produk = Produk::where('kode_produk', $produk->kode_produk)->get();
        Produk::destroy($produk->kode_produk);
        return redirect('/produk')->with('status', 'Data produk berhasil dihapus !');
    }

    public function getProdukbyKode(Request $request)
    {

        $produks = DB::table('produks')->select(DB::raw('*'))->where('kode_produk', $request->kode_produk)->first();
        

        return response()->json(['item'=>$produks]);
    }
}
