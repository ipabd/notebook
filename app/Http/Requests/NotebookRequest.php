<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
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
        $id = (int)$this->route()->parameter('id');
        return [
            'fio' => 'required',
            'telephone' => 'required',
            'email' => 'required|unique:notebooks,email,' . $id,
        ];
    }
}
