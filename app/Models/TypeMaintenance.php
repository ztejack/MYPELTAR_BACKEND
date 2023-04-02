<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMaintenance extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
    ];
    public $timestamps = false;


    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class);
    }
}
