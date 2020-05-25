<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name'=>         'bail|required|min:3',
            'description'=>  'bail|required|min:3',
            'link'=>         'bail|required|min:3|url',
            'status'=>       'bail|in:active,inactive'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.min' => ' name :input  atlist min character',
            'description.required'  => 'A description is required',
            'status.required'  => 'A status is required',
        ];
    }
//    public function attributes()
//    {
//        return [
//            'description' => 'Field Description:',
//        ];
//    }
}
