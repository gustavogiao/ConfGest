<?php

namespace App\Http\Requests\Admin\Conference;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

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
                'unique:conferences,acronym'.($conferenceId ? ','.$conferenceId : ''),
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'conference_date' => ['required', 'date', 'after_or_equal:today'],
            'speakers' => ['nullable', 'array'],
            'speakers.*' => [
                'exists:speakers,id',
                function ($attribute, $value, $fail) use ($conferenceId) {
                    $conferenceDate = $this->input('conference_date');
                    $exists = DB::table('conf_speakers')
                        ->join('conferences', 'conferences.id', '=', 'conf_speakers.conference_id')
                        ->where('conf_speakers.speaker_id', $value)
                        ->where('conferences.conference_date', $conferenceDate)
                        ->when($conferenceId, function ($query) use ($conferenceId) {
                            $query->where('conferences.id', '!=', $conferenceId);
                        })
                        ->exists();

                    if ($exists) {
                        $fail('This speaker is already assigned to another conference on the same date.');
                    }
                },
            ],
            'sponsors' => ['nullable', 'array'],
            'sponsors.*' => ['integer', 'exists:sponsors,id'],
        ];
    }
}
