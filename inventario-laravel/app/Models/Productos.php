<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['nombre', 'subcategoria_id'];

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}
