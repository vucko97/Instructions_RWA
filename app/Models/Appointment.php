<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $fillable = [
        'time',
        'date',
        'description',
        'contact',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
