<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    // protected $table = 'maintenances';
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_asset',
        'id_type',
        'id_urgency',
        'id_status',
        'description',
        'imagebefore',
        'imageafter',
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
    public function user_inspek()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function type()
    {
        return $this->belongsTo(TypeMaintenance::class, 'id_type');
    }
    public function urgency()
    {
        return $this->belongsTo(UrgencyLevel::class, 'id_urgency');
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
        return $this->belongsTo(Status::class, 'id_status');
    }
    // public function inspeksi()
    // {
    //     return $this->belongsToMany(Inspeksi::class, 'p_inspeksi_maintenance', 'maintenance_id', 'inspeksi_id');
    // }
    public function inspeksi()
    {
        return $this->belongsTo(Inspeksi::class);
    }
}
