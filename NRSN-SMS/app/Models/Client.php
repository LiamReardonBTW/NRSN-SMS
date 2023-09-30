<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'active',
        'phone',
        'email',
        'address',
        'invoicing_codes',
        'added'
    ];

    /**
     * Define a many-to-many relationship for supported clients.
     */
    public function supportedByUser()
    {
        return $this->belongsToMany(User::class)->withPivot('relation')->wherePivot('relation', 'supported_by');
    }

    /**
     * The clients managed by this user.
     */
    public function managedByUser()
    {
        return $this->belongsToMany(User::class)->withPivot('relation')->wherePivot('relation', 'managed_by');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'client_supported', 'id');
    }

    public function clientContracts()
    {
        return $this->hasMany(ClientContract::class, 'client_id');
    }

    public function activityRates()
    {
        return $this->hasMany(ActivityRate::class);
    }

    public function activities()
    {
        return $this->hasManyThrough(Activity::class, ActivityRate::class, 'client_id', 'id', 'id', 'activity_id');
    }

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'recipient');
    }

}
