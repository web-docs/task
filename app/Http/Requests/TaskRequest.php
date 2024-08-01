<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskRequest extends FormRequest
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
            'user_id' => 'required|int',
            'title'  => 'required|string',
            'description' => 'required|string',
            'status'   => 'required|int',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }
}



