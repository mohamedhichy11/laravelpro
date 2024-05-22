<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaire extends Model
{
    protected $table = 'notaires';

    protected $fillable = [
        'nom', 'email', 'age','numn'
    ];

    // Define relationships if any
    public function dossiersTerrain()
    {
        return $this->hasMany(DossierTerrain::class);
    }
}
