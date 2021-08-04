<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	protected $fillable = ['kode_produk','nama_produk','harga'];
	public $timestamps = false;
	public $incrementing = false;
	protected $primaryKey = 'kode_produk';
}

