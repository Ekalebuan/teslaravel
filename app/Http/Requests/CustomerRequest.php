<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'no_handphone'  => 'required|unique:customers,no_handphone',
            'nama_customer' => 'required',
            'alamat'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'no_handphone.required'     => 'No handphone harus diisi',
            'no_handphone.unique'       => 'No handphone sudah ada',
            'nama_customer.required'     => 'Nama customer harus diisi',
            'alamat.required'           => 'Alamat harus diisi'
        ];
    }
}
