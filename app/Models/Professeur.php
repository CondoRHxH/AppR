<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Professeur extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'Professeur';
    protected $fillable = ['Mat_prof','Telephone','Email','Filiere','Niveau','Prenom','Nom','Password'];

    protected $primaryKey = 'Mat_prof';

    public function Matiere()
    {
        return $this->belongsToMany(Matiere::class, 'Code_matiere');
    }

    public function Etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'N_appose');
    }


    // public function reclamers()
    // {
    //     return $this->hasMany(Reclamer::class, 'Mat_prof', 'Mat_prof');
    // }


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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
