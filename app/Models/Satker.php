<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satker extends Model
{
    use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'satker',
        // 'password',
    ];
    protected $dates = ['deleted_at'];

    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function subsatker()
    {
        return $this->hasMany(Subsatker::class, 'id_satker');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
