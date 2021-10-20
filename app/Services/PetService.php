<?php

namespace App\Services;

use App\Repositories\PetRepository;

class PetService
{
    public function __construct(
        private PetRepository $petRepository
    ) {}

    public function getPets(): array
    {
        return $this->petRepository->getPets();
    }
}