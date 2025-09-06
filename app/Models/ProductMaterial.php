<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    use HasFactory;

    public $table = 'product_materials';

    protected $guarded = ['id'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function material() {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function out() {
        return $this->hasMany(MaterialOut::class, 'product_material_id', 'id');
    }
}
