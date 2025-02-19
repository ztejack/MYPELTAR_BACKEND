<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'statustype',
        'status',
    ];
    protected $dates = ['deleted_at'];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
    public function assets()
    {
        return $this->belongsTo(Asset::class);
    }
    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class);
    }
    public function pupdate()
    {
        return $this->belongsToMany(PMaintenanceUpdate::class, 'id_status');
    }
}
