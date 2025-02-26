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
     * Boot method for the User model.
     *
     * This method is called when the model is initialized. It sets up an event listener
     * for the "creating" event, which is triggered before a new user record is created.
     *
     * When a new user is being created, this listener generates a UUID (version 4) and
     * assigns its hexadecimal representation to the `uuid` attribute of the user.
     *
     * @return void
     */
    // UuidV4::uuid4()->getHex() with UuidV4::uuid4()->toString().
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = UuidV4::uuid4()->toString();
        });
    }
    /**
     * Get the options for generating the slug.
     *
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['uuid', 'username'])
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key name for the model.
     *
     * This method overrides the default route key name used by Laravel
     * for model binding. By default, Laravel uses the model's primary key
     * (usually 'id') as the route key name. This method changes it to use
     * the 'uuid' attribute instead.
     *
     * @return string The attribute name to be used as the route key.
     */
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
        return ['uuid' => $this->uuid];
    }

    /**
     * Scope a query to only include users with a given role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $roleName
     * @return \Illuminate\Database\Eloquent\Builder
     */
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
}
