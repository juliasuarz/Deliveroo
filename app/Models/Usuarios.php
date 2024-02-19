<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurantes;

class Usuarios extends Model
{
    use HasFactory;

    public function restaurantes() {
        return $this->belongsTo(Restaurantes::class);
    }
}
