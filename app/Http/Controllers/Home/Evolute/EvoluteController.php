<?php

namespace App\Http\Controllers\Home\Evolute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvoluteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home.evolute');
    }
}
