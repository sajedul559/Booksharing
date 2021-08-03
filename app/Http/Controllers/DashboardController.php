<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = Auth::user();
        if (!is_null($users)) {
            $books = $users->books;

            return view('frontend.pages.users.dashboard', compact('users'));
        }
        return redirect()->route('index');
    }

    public function books()
    {
        $users = Auth::user();

        if (!is_null($users)) {
            $books = $users->books;

            return view('frontend.pages.users.dashboard_books', compact('users', 'books'));
        }
        return redirect()->route('index');
    }
}
