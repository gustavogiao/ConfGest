<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'acronym', 'name', 'description', 'location', 'conference_date',
    ];

    protected $casts = [
        'conference_date' => 'date',
    ];

    public function participants()
    {
        return $this->belongsToMany(User::class, 'conf_participants', 'conference_id', 'participant_id')
            ->withTimestamps()
            ->withPivot('registration_date');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'conf_speakers')
            ->withTimestamps();
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'conf_sponsors')
            ->withTimestamps();
    }
}
