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

}
