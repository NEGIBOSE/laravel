<?php

namespace App\Http\Controllers\Tweet\Reading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('tweet.reading');
    }
}