<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
            'pets' => $this->getPets(),
        ]);
    }

    private function getPets(): array
    {
        return [
            'Salem',
            'Merlin',
            'Albus',
        ];
    }
}
