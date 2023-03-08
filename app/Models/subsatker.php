<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsatker extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subsatker',
        'id_satker',
        // 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];


    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function satker()
    {
        return $this->belongsTo(Satker::class, 'id_satker');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_subsatker');
    }
}
