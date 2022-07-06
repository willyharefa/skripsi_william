<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $casts = [
        'birthday' => 'datetime'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function classgroup()
    {
        return $this->hasOne(Classgroup::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }
    public function assestment()
    {
        return $this->hasOne(Assestment::class);
    }
    public function ortu()
    {
        return $this->hasOne(Ortu::class);
    }
}
