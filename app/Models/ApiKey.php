<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'api_key',
        'expiration_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
