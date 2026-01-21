<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class CompactDiscCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'artist' => 'required|string|unique:compact_discs',
            'album_name' => 'required|string',
            'number_of_songs' => 'required|integer|gt:0',
            'released_on' => 'nullable|date',
            'rating' => 'nullable|integer|between:1,10',
            'acquired_on'=> 'nullable|date',
            'last_used_on'=> 'nullable|date',
            'status'=> 'nullable|string',
            'purchase_price'=> 'nullable|decimal',
            'purchase_location'=> 'nullable|string',
            'description' => 'nullable|string'
        ];
    }
}
