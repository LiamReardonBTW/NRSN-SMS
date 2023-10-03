<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'tfn',
        'abn',
        'bankname',
        'bankaddress',
        'bankaccountnumber',
        'bankbsbnumber',
    ];
}
