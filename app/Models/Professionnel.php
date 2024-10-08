<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'domaine',
        'ville',
        'commune',
        'prixprestation',
        'detail',
        'telephone',
        'image',
        'user_id',
    ];
    public function sousCategorie()
    {
        return $this->belongsTo(SousCategorie::class, 'domaine', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class, 'professionnel_id', 'id');
    }
}
