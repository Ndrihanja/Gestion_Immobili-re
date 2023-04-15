<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = ['logement_id', 'client_id', 'prix_total', 'date_achat'];

    public function type_achats()
    {
        return $this->belongsToMany(TypeAchat::class, "achat_type_achats");
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function logements()
    {
        return $this->belongsTo(Logement::class, 'logement_id');
    }
}
