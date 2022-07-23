<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataKeluargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nama'     => 'required',
          'jk'  => 'required',
          'tmp_lahir'  => 'required',
          'tgl_lahir'  => 'required',
          'alamat'  => 'required',
          'no_hp'  => 'required',
            'nama_hubungan'  => 'required',
            'hubungan'  => 'required',
        ];
    }

     public function messages()
    {
        return [
            'nama.required'        => "Nama teu kengeng kosong.",
            'jk.required'        => "teu kengeng kosong.",
            'tmp_lahir.required'        => "Tempat lahir teu kengeng kosong.",
            'tgl_lahir.required'        => "Tanggal lahir teu kengeng kosong.",
            'alamat.required'        => "alamat teu kengeng kosong.",
            'no_hp.required'        => "no hp teu kengeng kosong.",
            'nama_hubungan.required'        => "nama teu kengeng kosong.",
            'hubungan.required'        => "hubungan teu kengeng kosong.",
        ];
    }
}
