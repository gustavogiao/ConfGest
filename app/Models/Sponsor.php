<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
