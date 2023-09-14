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

    public function clientContracts()
    {
        return $this->belongsToMany(ClientContract::class, 'client_contract_activity');
    }

}
