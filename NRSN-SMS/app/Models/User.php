<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasProfilePhoto;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value ? bcrypt($value) : null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'tfn',
        'abn',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Define a many-to-many relationship for supported clients.
     */
    public function supportedClients()
    {
        return $this->belongsToMany(Client::class)->withPivot('relation')->wherePivot('relation', 'supported_by');
    }

    /**
     * The clients managed by this user.
     */
    public function managedClients()
    {
        return $this->belongsToMany(Client::class)->withPivot('relation')->wherePivot('relation', 'managed_by');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'submitted_by', 'id');
    }

    public function userContracts()
    {
        return $this->hasMany(UserContract::class, 'user_id');
    }

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'recipient');
    }

}
