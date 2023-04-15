<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;
    protected $fillable = ['nom_agence', 'phone', 'mail', 'province_id'];

    public function cites()
    {
        return $this->hasMany(Cite::class);
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
