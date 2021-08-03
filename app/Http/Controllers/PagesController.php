<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;
use App\Publisher;

class PagesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $books = Book::orderBy('id', 'desc')->paginate(3);

        return view('frontend.pages.index', compact('books', 'categories', 'publishers'));
    }
}
