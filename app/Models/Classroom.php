<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function squad()
    {
        return $this->hasMany(Squad::class);
    }
    public function classgroup()
    {
        return $this->hasMany(Classgroup::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
