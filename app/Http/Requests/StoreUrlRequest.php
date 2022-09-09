<?php

namespace App\Http\Requests;

use App\Models\Url;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreUrlRequest extends FormRequest
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

    public function prepareForValidation()
    {
        do {
            $slug = Str::random('10');
            $check = Url::where('slug', $slug)->count();
        } while ($check > 0);

        $this->merge([
            'slug' => $slug,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'url' => 'required|max:2083|active_url',
            'slug' => 'required|max:2083|unique:urls,slug',
        ];
    }
}
