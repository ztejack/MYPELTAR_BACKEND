<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stockcode',
        // 'code',
        'nama',
        'merk',
        'model',
        'spesifikasi',
        'deskripsi',
        'id_lokasi',
        // 'id_kategori',
        'id_status',
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
    public function lokasi()
    {
        return $this->belongsTo(Location::class, 'id_lokasi');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function status()
    {
        return $this->belongsTo(StatusAssets::class, 'id_status');
    }
}
