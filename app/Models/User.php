<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPasswordContract
{
    use CanResetPasswordTrait, HasFactory, Notifiable;

    protected $fillable = [
        'firstname', 'lastname', 'username', 'user_type_id',
        'email', 'password', 'description', 'last_login', 'is_active',
    ];

    protected $hidden = ['password'];

    public function type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'conf_participants', 'participant_id', 'conference_id')
            ->withTimestamps()
            ->withPivot('registration_date');
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
