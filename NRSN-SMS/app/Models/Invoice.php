<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'totalamount',
        'status',
        'pdf_path',
        'recipient_id',
        'recipient_type',
        // Add other fields here as needed
    ];

    // Define the recipient polymorphic relationship
    public function recipient()
    {
        return $this->morphTo();
    }

}
