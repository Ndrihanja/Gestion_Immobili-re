<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatTypeAchat extends Model
{
    use HasFactory;
    protected $fillable = ['achat_id', 'type_achat_id'];
}
