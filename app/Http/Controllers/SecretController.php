<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function index(Request $request): View|Factory
    {
        return view('secrets.index', []);
    }

    public function show(Request $request, int $id): View|Factory
    {
        return view('secrets.show', [
            'secret' => auth()->user()->secrets()->findOrFail($id),
        ]);
    }
}
