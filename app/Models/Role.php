<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
    ];
    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'id_role');
    }
}
