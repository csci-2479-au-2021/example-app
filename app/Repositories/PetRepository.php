<?php

namespace App\Repositories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Collection;

class PetRepository
{
    // in reality this class will utilize Eloquent models to query the DB

    public function getPets(): Collection
    {
        return Pet::orderBy('name')->get();
    }
}