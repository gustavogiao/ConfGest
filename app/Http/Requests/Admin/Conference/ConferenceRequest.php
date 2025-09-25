<?php

namespace App\Http\Requests\Admin\Conference;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
{
    public function rules(): array
    {
        $conferenceId = $this->route('conference')?->id ?? $this->route('conference') ?? null;

        return [
            'acronym' => [
                'required',
                'string',
                'max:50',
                'unique:conferences,acronym' . ($conferenceId ? ',' . $conferenceId : ''),
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'conference_date' => ['required', 'date', 'after_or_equal:today'],
            'speakers' => ['nullable', 'array'],
            'speakers.*' => ['exists:speakers,id'],
            'sponsors' => ['nullable', 'array'],
            'sponsors.*' => ['integer', 'exists:sponsors,id'],
        ];
    }

}
