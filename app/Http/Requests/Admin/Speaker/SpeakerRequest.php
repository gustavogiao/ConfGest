<?php

namespace App\Http\Requests\Admin\Speaker;

use Illuminate\Foundation\Http\FormRequest;

class SpeakerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'affiliation' => ['nullable', 'string', 'max:1000'],
            'biography' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'], // Max 2MB
            'social_networks' => ['nullable', 'array'],
            'page_link' => ['nullable', 'url', 'max:255'],
            'is_active' => ['required', 'boolean'],
            'speaker_type_id' => ['required', 'exists:speaker_types,id'],
        ];
    }
}
