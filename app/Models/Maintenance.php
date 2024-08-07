<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenances';
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user_inspeksi',
        'id_asset',
        'id_type',
        'deskripsi',
        'fotobefore',
        'fotoafter',
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

    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function user_inspek()
    {
        return $this->belongsTo(User::class, 'id_user_inspeksi');
    }
    public function type()
    {
        return $this->belongsTo(TypeMaintenance::class, 'id_type');
    }
    public function pupdates()
    {
        return $this->hasmany(PMaintenanceUpdate::class, 'id_maintenance');
    }
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'id_asset');
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function inspeksi()
    {
        return $this->belongsToMany(Inspeksi::class, 'p_inspeksi_maintenance', 'maintenance_id', 'inspeksi_id');
    }
}
