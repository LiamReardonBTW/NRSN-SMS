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
        'date',
        'expenses',
        'km',
        'hours',
        'activity_id',
        'approved',
        'paid',
        'is_public_holiday',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function submittedByUser()
    {
        return $this->belongsTo(User::class, 'submitted_by', 'id');
    }

    public function clientSupported()
    {
        return $this->belongsTo(Client::class, 'client_supported', 'id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function clientInvoice()
    {
        return $this->belongsTo(Invoice::class, 'clientinvoice_id');
    }

    public function workerInvoice()
    {
        return $this->belongsTo(Invoice::class, 'workerinvoice_id');
    }

}
