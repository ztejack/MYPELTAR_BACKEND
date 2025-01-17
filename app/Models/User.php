<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

// class User extends Authenticatable implements LdapAuthenticatable, JWTSubject
class User extends Authenticatable implements JWTSubject
{

    // use   Notifiable, AuthenticatesWithLdap;
    use  HasFactory, Notifiable, HasRoles, HasApiTokens, HasSlug, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'uuid',
        'id_divisi',
    ];
    protected $dates = ['deleted_at'];

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
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        // return SlugOptions::create()
        //     ->generateSlugsFrom('name')
        //     ->saveSlugsTo('slug');
        return SlugOptions::create()
            ->generateSlugsFrom(['username', 'uuid'])
            ->saveSlugsTo('slug')
            ->usingLanguage('nl');;
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }
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
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = UuidV4::uuid4()->getHex();
        });
    }
    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    // }
    public function scopeWithRole($query, $roleName)
    {
        return $query->whereHas('role', function ($q) use ($roleName) {
            $q->where('role', $roleName);
        });
    }

    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    // public function role()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class);
    }
    public function inspeksi()
    {
        return $this->belongsToMany(Inspeksi::class);
    }
    // public function apiKey()
    // {
    //     return $this->hasOne(ApiKey::class);
    // }
}
