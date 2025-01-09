<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeMaintenance extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];



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
