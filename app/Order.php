<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table 		= 'orders';
    protected $fillable 	= ['kode_struk','id_customer','tanggal','grandtotal','payment','balance'];
	public $timestamps 		= false;
	public $incrementing 	= false;
	protected $primaryKey 	= 'kode_struk';
}
