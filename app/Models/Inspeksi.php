<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'image',
        'id_user',
        'id_maintenance',
        'id_asset',
    ];
    // public function maintenance()
    // {
    //     return $this->belongsToMany(Maintenance::class, 'p_inspeksi_maintenance', 'inspeksi_id', 'maintenance_id');
    // }
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'id_asset');
    }
    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class, 'id_maintenance');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
