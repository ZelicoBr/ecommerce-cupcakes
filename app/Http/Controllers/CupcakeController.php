<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupcake;

class CupcakeController extends Controller
{
    public function index() {
        // Retornar todos os cupcakes
        $cupcakes = Cupcake::all();
        return view('cupcakes.index', compact('cupcakes'));
    }
}
