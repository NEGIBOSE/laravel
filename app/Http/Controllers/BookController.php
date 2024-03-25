<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function saveBookData(Request $request)
    {
        $imageUrl = $request->input('image_url');
        $title = $request->input('title');

        // Bookモデルを使用してデータを保存する
        $book = new Book();
        $book->image_url = $imageUrl;
        $book->title = $title;
        $book->save();

        return response()->json(['message' => 'Book data saved successfully']);
    }
}
