<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'id_subsatker',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function assets()
    {
        return $this->belongsToMany(Asset::class);
    }
    public function subsatker()
    {
        return $this->belongsTo(Subsatker::class, 'id_subsatker');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
