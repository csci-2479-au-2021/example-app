<?php

namespace App\Repositories;

class PetRepository
{
    // in reality this class will utilize Eloquent models to query the DB

    public function getPets(): array
    {
        $pets = [
            'Milo',
            'Otis',
        ];

        // pretend this does some DB SELECT query...
        
        return $pets;
    }
}