<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function show()
    {
    	return view('frontend.pages.books.show');
    }
}
