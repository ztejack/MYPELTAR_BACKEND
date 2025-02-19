<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stockcode',
        'code_ast',
        'serialnumber',
        'name',
        'brand',
        'model',
        'image',
        'specifications',
        'description',
        'id_location',
        'id_status',
    ];
    protected $dates = ['deleted_at'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'code_ast';
    // }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($asset) {
            // Generate a unique serial code for the asset while it's creatign
            $asset->code_ast = IdGenerator::generate(['table' => 'assets', 'length' => 11, 'field' => 'code_ast', 'prefix' => 'AST' . date('ym')]);
        });
    }

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
        return $this->belongsTo(Location::class, 'id_location');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
