<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'uuid',
        'api_key',
    ];
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Decrypt the API key attribute.
     *
     * @param  string  $value
     * @return string|null
     */
    // public function getApiKeyAttribute($value)
    // {
    //     if ($value) {
    //         return Crypt::encrypt($value);
    //     }

    //     return null;
    // }

    // /**
    //  * Encrypt the API key attribute.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // public function setApiKeyAttribute($value)
    // {
    //     $this->attributes['api_key'] = Crypt::encryptString($value);
    // }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($client) {
            $key = strtoupper(Str::uuid()->toString());
            // $encryptedKey = Crypt::encryptString($key);
            // $client->api_key = $encryptedKey;
            $client->api_key = $key;
            $client->uuid = strtoupper(UuidV4::uuid4()->getHex());
        });
    }
}
