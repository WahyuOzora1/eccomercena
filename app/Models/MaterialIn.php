<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialIn extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'material_ins';
    protected $guarded = ['id'];
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id')->withTrashed();
    }
}
