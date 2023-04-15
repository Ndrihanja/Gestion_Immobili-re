<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;
    protected $fillable = ['nom_cite', 'agence_id'];

    public function agences()
    {
        return $this->belongsTo(Agence::class);
    }

    public function logement()
    {
        return $this->hasMany(Logement::class, 'agence_id');
    }
}
