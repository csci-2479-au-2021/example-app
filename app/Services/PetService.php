<?php

namespace App\Services;

use App\Repositories\PetRepository;
use Illuminate\Database\Eloquent\Collection;

class PetService
{
    public function __construct(
        private PetRepository $petRepository
    ) {}

    public function getPets(): Collection
    {
        return $this->petRepository->getPets();
    }
}