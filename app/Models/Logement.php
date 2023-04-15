<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use HasFactory;
    protected $fillable = ['lot', 'nom_logement', 'image', 'prix', 'cite_id', 'terrain_id', 'type_logement_id'];

    public function cites()
    {
        return $this->belongsTo(Cite::class);
    }

    public function terrains()
    {
        return $this->belongsTo(Terrain::class);
    }

    public function type_logements()
    {
        return $this->belongsTo(TypeLogement::class);
    }

    public function achats()
    {
        return $this->hasOne(Achat::class);
    }
}
