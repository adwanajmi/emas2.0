<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFokusutamaRequest extends FormRequest
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

            'keteranganFokus' => [
                'string',
                'required',
            ],

            'namaFokus' => [
                'string',
                'required',
            ],

            'user_id' => [
                'string',
            ],
        ];
    }
}
