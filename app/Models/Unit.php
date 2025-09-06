<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'units';

    protected $guarded = ['id'];

    public function material() {
        return $this->hasMany(Material::class, 'unit_id', 'id');
    }
}
