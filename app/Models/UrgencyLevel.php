<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrgencyLevel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'urgency_levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_name',
        'priority_level',
        'description',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'priority_level' => 'integer',
    ];

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
