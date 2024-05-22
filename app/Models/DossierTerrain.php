<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierTerrain extends Model
{
    protected $table = 'dossier_terrain';

    protected $fillable = [
        'titre', 'cabinet','numero'
    ];

    // Define relationships if any
    public function notaire()
    {
        return $this->belongsTo(Notaire::class);
    }
}
