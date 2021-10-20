<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PetService;

class HomeController extends Controller
{
    public function __construct(
        private PetService $petService
    ) { }

    public function phpinfo(): bool
    {
        return phpinfo();
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'pets' => $this->petService->getPets(),
        ]);
    }
}
