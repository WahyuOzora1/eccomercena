<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'materials';
    protected $guarded = ['id'];
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id')->withTrashed();
    }

    public function materialIn()
    {
        return $this->hasMany(MaterialIn::class, 'material_id', 'id');
    }

    public function materialOut()
    {
        return $this->hasMany(MaterialOut::class, 'material_id', 'id');
    }

    public function product_material() {
        return $this->hasMany(ProductMaterial::class, 'material_id', 'id');
    }

}
