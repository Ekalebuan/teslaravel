<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acktive = 'Order';
        $order = \DB::table('orders as od')
            ->join('customers as cus', 'cus.id_customer', '=', 'od.id_customer')
            ->select('od.*','cus.nama_customer','cus.no_handphone','cus.alamat')
            ->get();
        return view('order.list', compact('order','acktive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $acktive = 'Order';
        $kode_struk = $order->kode_struk;

        $orders = \DB::table('orders as od')
            ->join('customers as cus', 'cus.id_customer', '=', 'od.id_customer')
            ->select('od.*','cus.nama_customer','cus.no_handphone','cus.alamat')
            ->where('od.kode_struk', $kode_struk)
            ->first();

        $item = \DB::table('items as it')
            ->join('orders as od', 'od.kode_struk', '=', 'it.kode_struk')
            ->leftjoin('produks as prd', 'prd.kode_produk', '=', 'it.kode_produk')
            ->select('it.*','prd.nama_produk')
            ->where('it.kode_struk', $kode_struk)
            ->get();

        return view('order.detail', compact('orders','item','acktive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function saveOrder(Request $request)
    {
        $awal = 'SP'.date('dmY');
        $tgl = date('Y-m-d');

        $order = DB::table('orders')->select(DB::raw('MAX(RIGHT(kode_struk,10)) as kd_max'))->where('tanggal', 'like', $tgl.'%')->get();

        if ($order->count()>0) {
            foreach ($order as $key ) {
                $tmp = ((int)$key->kd_max)+1;
                $kode = $awal.sprintf("%010s",$tmp);
            }
        }else {
            $kode = $awal."0000000001";
        }

        $transStatus = true;
        $transMsg =null;
        DB::beginTransaction();
        try{
            $input  = $request['order'];
            $items  = $request['detail'];
            
            $order = new Order();
            $order->kode_struk  = $kode;
            $order->id_customer = $input['id_customer'];
            $order->tanggal     = $input['tanggal'];
            $order->grandtotal  = $input['grandtotal'];
            $order->payment     = $input['payment'];
            $order->balance     = $input['balance'];
            $order->save();


            foreach ($items as $items){
                $item = new Item();
                $item->kode_struk    = $kode;
                $item->kode_produk   = $items['kode_produk'];
                $item->hargasatuan   = $items['hargasatuan'];
                $item->qty           = $items['qty'];
                $item->subtotal      = $items['subtotal'];
                $item->save();
            }
        }
            catch(\Exception $e){
            $transStatus= false;
        }

        $transMsg = "";
        if ($transStatus == true) {
            $transMsg = 'Sukses';
            DB::commit();
            $result = array(
                "status" => 201,
                "message" => $transMsg,
                "data" => $order,
                "as" => 'as@eckha',
            );
        } else {
            $transMsg = 'Gagal!!';
            DB::rollBack();
            $result = array(
                "status" => 400,
                "message"  => $transMsg,
                "data" => $order,
                "as" => 'as@eckha',
            );
        }
                    

        
        return json_encode(['result'=>$result]);

    }
}
