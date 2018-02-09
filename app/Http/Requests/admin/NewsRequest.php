<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [
            'datetime' => 'required|date_format:Y-m-d H:i:s'
        ];
        
        foreach ($this->title as $language_id => $value) {
            $rules['title.' . $language_id] = 'required|string|min:5|max:255';
        }

        return $rules;
    }
}
