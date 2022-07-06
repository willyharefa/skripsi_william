<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assestment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function academicYear()
    {
        return $this->belongsTo(academicYear::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
