<?php

namespace App\Http\Controllers\Tweet\Registerbook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterbookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('tweet.registerbook');
    }
}
