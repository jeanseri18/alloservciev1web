<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'entreprise',
        'registre_de_commerce',
        'adresse',
        'telephone',
        'description',
        'mot_cle',
        'souscategorie_id',
        'categorie_id',
        'latitude',
        'longitude',
        'facebook',
        'whatsapp',
        'youtube',
        'roles',
        'statut'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // App/Models/User.php

public function avis()
{
    return $this->hasMany(Avis::class, 'user_id', 'id');
}
public function services()
{
    return $this->hasMany(Service::class, 'user_id', 'id'); // Adapte en fonction de ta structure de base de données
}

// Relation avec les professionnels
public function professionnels()
{
    return $this->hasMany(Professionnel::class, 'user_id', 'id'); // Adapte en fonction de ta structure de base de données
}
public function horaires()
{
    return $this->hasMany(Horaire::class, 'user_id', 'id'); // Adapte en fonction de ta structure de base de données
}
public function avisCount()
{
    return $this->avis()->count();
}

}
