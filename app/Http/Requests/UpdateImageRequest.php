<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
            'imagable_type'=>'required|max:255',
            'imagable_id'=>'required|max:255',
            'size'=>'required|max:255',
            'path'=>'required|max:255',
            'name'=>'required|max:255',
            'extension'=>'required|max:255',
        ];
    }
}
