<?php

namespace Database\Seeders;

use App\Models\DossierTerrain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Terrainsed extends Seeder
{
   
    public function run(): void
    {
    
        $dossiers = [
            ['titre' => 'Dossier 1'],
            ['titre' => 'Dossier 2'],
            
        ];

       
        foreach ($dossiers as $dossier) {
            DossierTerrain::create($dossier);
        }
    }
}
