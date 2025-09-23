<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpeakerType extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
}

