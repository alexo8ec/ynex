<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThrottleConfig extends Model
{
    use HasFactory;

    protected $table = 'throttle_config';

    protected $fillable = [
        'max_attempts',
        'decay_minutes',
    ];
}
