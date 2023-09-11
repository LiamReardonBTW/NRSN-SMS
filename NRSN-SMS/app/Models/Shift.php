<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'notes',
        'submitted_by',
        'client_supported',
        'isflagged',
        'isinvoiced',
        'date',
        'expenses',
        'km',
        'hours',
    ];

    public function submittedByUser()
    {
        return $this->belongsTo(User::class, 'submitted_by', 'id');
    }

    public function clientSupported()
    {
        return $this->belongsTo(Client::class, 'client_supported', 'id');
    }

}
