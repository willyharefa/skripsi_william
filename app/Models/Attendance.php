<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'date_absence' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
