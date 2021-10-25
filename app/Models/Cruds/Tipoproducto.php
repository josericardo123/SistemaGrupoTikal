<?php

namespace App\Models\Cruds;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoproducto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function producto(){
        return $this->hasMany(Producto::class);
    }

}
