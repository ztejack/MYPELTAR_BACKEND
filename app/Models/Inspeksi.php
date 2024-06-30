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
        'deskripsi',
        'image',
        'id_user',
        'id_asset',
    ];
    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class, 'p_inspeksi_maintenance', 'inspeksi_id', 'maintenance_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
