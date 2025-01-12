<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsatker extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subsatker',
        'id_satker',
    ];
    protected $dates = ['deleted_at'];


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
        return $this->hasMany(User::class, 'id_user');
    }
    public function category()
    {
        return $this->hasMany(Category::class, 'id_subsatker');
    }
}
