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
        'balance',
        'weekdayhourlyrate',
        'saturdayhourlyrate',
        'sundayhourlyrate',
        'publicholidayhourlyrate',
        'active',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
