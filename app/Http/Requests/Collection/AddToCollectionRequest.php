<?php

namespace App\Http\Requests\Collection;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddToCollectionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|string',
            'video_ids' => 'required|array',
            'video_ids.*' => 'exist:videos,id' // This line is to check if the IDs exist in the videos table.
        ];
    }
}
