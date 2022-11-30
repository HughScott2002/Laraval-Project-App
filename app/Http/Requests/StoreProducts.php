<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProducts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|bail|min:2|max:1000',
            'type' => 'required|bail|min:1|max:1000',
            'manufacturer' => 'required|bail|min:1|max:1000',
            'quantity' => 'required',
            'discount' => 'required',
            'price_range' => 'required',
        ];
    }
}
