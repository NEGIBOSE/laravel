<?php

namespace App\Http\Controllers\Home\Growth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrowthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home.growth');
    }
}
