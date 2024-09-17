<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'tel',
        'detail_message',
        'user_id',
        'nbre_etoile',
        'professionnel_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function professionnel()
    {
        return $this->belongsTo(Professionnel::class, 'professionnel_id');
    }
}

