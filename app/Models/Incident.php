<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'telephone',
        'adresse',
        'userID',
        'categorieID',
        'statutID'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class, 'categorieID');
    }

    public function statut() {
        return $this->belongsTo(Statut::class, 'statutID');
    }
}
