<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'id_souscat',
    ];

    // Si le modèle a une relation avec une sous-catégorie
    public function souscategorie()
    {
        return $this->belongsTo(SousCategorie::class, 'id_souscat');
    }
}
