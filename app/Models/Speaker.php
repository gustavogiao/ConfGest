<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'affiliation', 'biography', 'photo', 'social_networks',
        'page_link', 'speaker_type_id', 'is_active'
    ];

    protected $casts = [
        'social_networks' => 'array',
        'is_active' => 'boolean',
    ];

    public function type()
    {
        return $this->belongsTo(SpeakerType::class, 'speaker_type_id');
    }

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'conf_speakers')
            ->withTimestamps();
    }

    public function getDisplayStatusAttribute(): string
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    public function getStatusClassAttribute(): string
    {
        return $this->is_active
            ? 'text-green-600 dark:text-green-400'
            : 'text-red-600 dark:text-red-400';
    }


}

