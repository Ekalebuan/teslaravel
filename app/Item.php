<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table 		= 'items';
    protected $fillable 	= ['kode_struk','kode_produk', 'hargasatuan','qty','subtotal'];
	public $timestamps 		= false;
	protected $primaryKey 	= 'id_item';
}
