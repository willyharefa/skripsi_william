<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'teachers';
    protected $guarded = ['id'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime',
    ];

    public function squad()
    {
        return $this->hasMany(Squad::class);
    }

    public function classgroup()
    {
        return $this->hasMany(Classgroup::class);
    }
    public function assestment()
    {
        return $this->hasOne(Assestment::class);
    }
}

    
