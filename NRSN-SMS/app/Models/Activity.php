<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'activityname',
        'weekdayhourlycode',
        'saturdayhourlycode',
        'sundayhourlycode',
        'publicholidayhourlycode',
        'active',
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'activity_rates');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

}
