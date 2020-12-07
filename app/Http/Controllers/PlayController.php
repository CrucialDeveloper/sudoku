<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function index()
    {
        return Inertia::render('Play/SudokuGame');
    }
}
