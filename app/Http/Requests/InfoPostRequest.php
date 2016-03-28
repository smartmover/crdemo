<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InfoPostRequest extends Request
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
            'name'           => 'required',
            'gender'         => 'required',
            'phone'          => 'required',
            'email'          => 'required|email',
            'address'        => 'required',
            'nationality'    => 'required',
            'dob'            => 'required',
            'edu_background' => 'required',
            'prefer_moc'     => 'required',
        ];
    }
}
