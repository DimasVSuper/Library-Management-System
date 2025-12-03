<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'join_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'join_date' => 'date',
    ];
}
