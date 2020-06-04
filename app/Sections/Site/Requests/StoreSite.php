<?php

namespace App\Sections\Site\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSite extends FormRequest
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
            'name' => 'required|string|max:255',
            'callback' => 'required|string|url|unique:sites,callback,' . $this->route('id')
        ];
    }

    public function retrieve()
    {
        $values = $this->validated();
        $values['user_id'] = $this->user()->id;

        return $values;
    }
}
