<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'category', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'conf_sponsors')
            ->withTimestamps();
    }
}

