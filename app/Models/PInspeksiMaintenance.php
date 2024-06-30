<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PInspeksiMaintenance extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_maintenance',
        'id_inspeksi',
        'deskripsi',
        'image'
    ];
    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class, 'id_maintenance');
    }
    public function inspeksi()
    {
        return $this->belongsTo(Inspeksi::class, 'id_inspeksi');
    }
}
