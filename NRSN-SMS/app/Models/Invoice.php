<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'recipient_id',
        'date',
        'totalamount',
        'status',
        'pdf_path',
        // Add other fields here as needed
    ];

}
