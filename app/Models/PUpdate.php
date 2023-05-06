<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUpdate extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'id_asset',
        'id_user',
        'id_maintenance',
        'id_status',
        'deskripsi',
        'image'
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
    protected $casts = [
        // 'create_at' =
    ];
    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class, 'id_maintenance');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
