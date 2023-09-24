<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRate extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_id',
        'client_id',
        'weekdayhourlyrate',
        'saturdayhourlyrate',
        'sundayhourlyrate',
        'publicholidayhourlyrate',
        'effective_date'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
