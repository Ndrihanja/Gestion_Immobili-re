<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLogement extends Model
{
    use HasFactory;
    protected $fillable = ['type'];

    public function logement()
    {
        return $this->hasMany(Logement::class);
    }
    
}
