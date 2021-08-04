<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Customer;
use App\Order;
use App\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function home ()
    {
    	$acktive = 'Dasbor';
    	$produk = DB::table('produks')->orderBy('nama_produk', 'desc')->get();
    	$customer = DB::table('customers')->orderBy('no_handphone', 'asc')->get();

    	$awal = 'SP'.date('dmY');
        $tgl = date('Y-m-d');

        $order = DB::table('orders')->select(DB::raw('MAX(RIGHT(kode_struk,10)) as kd_max'))->where('tanggal', 'like', '$tgl%')->get();

        if ($order->count()>0) {
            foreach ($order as $key ) {
                $tmp = ((int)$key->kd_max)+1;
                $kode = $awal.sprintf("%010s",$tmp);
            }
        }else {
            $kode = $awal."0000000001";
        }

    	return view('dasbor.index', compact('acktive','produk','customer','kode') );
    }

}
