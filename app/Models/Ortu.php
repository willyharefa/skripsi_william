<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ortu extends Authenticatable
{
    use HasFactory;

    protected $table = 'ortus';
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
