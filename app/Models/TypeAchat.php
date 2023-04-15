<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAchat extends Model
{
    use HasFactory;

    protected $fillable = ['achat'];

    public function achats()
    {
        return $this->belongsToMany(Achat::class);
    }
}
