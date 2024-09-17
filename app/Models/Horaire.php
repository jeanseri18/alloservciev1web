<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour_semaine',
        'heure_ouverture',
        'heure_fermeture',
        'statut_ouverture',
    ];
}
