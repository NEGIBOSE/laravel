<?php

namespace App\Http\Controllers\Home\Bookshelf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home.bookshelf');
    }
}
