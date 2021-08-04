<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nama_customer','no_handphone', 'alamat'];
	public $timestamps = false;
	protected $primaryKey = 'id_customer';
}
