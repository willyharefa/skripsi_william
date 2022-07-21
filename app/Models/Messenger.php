<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ortu()
    {
        return $this->belongsTo(Ortu::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
