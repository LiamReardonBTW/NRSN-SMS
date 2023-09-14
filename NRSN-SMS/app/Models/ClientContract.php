<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'startdate',
        'enddate',
        'totalallocated',
        'balance',
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

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

}
