<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'nom',
        'description'
    ];

    public function incidents() {
        return $this->hasMany(Incident::class, 'categorieID');
    }
}
