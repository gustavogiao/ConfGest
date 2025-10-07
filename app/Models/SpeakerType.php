<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class SpeakerType extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
}
