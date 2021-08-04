<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode_produk'   => 'required',
            'nama_produk'   => 'required',
            'harga'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_produk.required'  => 'Kode produk harus diisi',
            'nama_produk.required'  => 'Nama produk harus diisi',
            'harga.required'        => 'Harga satuan harus diisi',
        ];
    }
}
