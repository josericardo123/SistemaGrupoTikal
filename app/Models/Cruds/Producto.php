<?php

namespace App\Models\Cruds;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipoproductos(){
        return $this->belongsTo(Tipoproducto::class);
    }
}
