<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'startdate',
        'enddate',
        'weekdayhourlyrate',
        'saturdayhourlyrate',
        'sundayhourlyrate',
        'publicholidayhourlyrate',
        'active',
    ];

    protected $casts = [
        'enddate' => 'datetime',
        'startdate' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
