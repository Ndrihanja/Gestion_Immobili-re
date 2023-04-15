<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = ['surface', 'aire'];

    public function logement()
    {
        return $this->hasMany(Logement::class);
    }
}
