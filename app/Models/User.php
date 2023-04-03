<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

// class User extends Authenticatable implements LdapAuthenticatable, JWTSubject
class User extends Authenticatable implements JWTSubject
{

    // use   Notifiable, AuthenticatesWithLdap;
    use Notifiable, HasApiTokens, HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'id_role',
        'id_subsatker',
        // 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function subsatker()
    {
        return $this->belongsTo(Subsatker::class, 'id_subsatker');
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class);
    }
}
