<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialOut extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'material_outs';
    protected $guarded = ['id'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id')->withTrashed();
    }

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function order_item() {
        return $this->belongsTo(OrderItem::class, 'order_item_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function product_material() {
        return $this->belongsTo(ProductMaterial::class, 'product_material_id', 'id');
    }
}
