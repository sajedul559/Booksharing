<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\BookAuthor;
use App\Publisher;
use App\Author;

use App\Category;

use File;
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

            return view('frontend.pages.users.dashboard', compact('users', 'books'));
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

    public function bookEdit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $publishers = Publisher::all();
        $categories = Category::all();
        $authors = Author::all();
        $books = Book::where('is_approved', 1)->where('slug', '!=', $slug)->get();

        return view('frontend.pages.users.edit', compact('publishers', 'categories', 'authors', 'books', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookupdate(Request $request, $slug)
    {


        $book =  Book::where('slug', $slug)->first();

        $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books,slug,' . $book->id,
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $book->title = $request->title;
        if (empty($request->slug)) {
            $book->slug = str_slug($request->title);
        } else {
            $book->slug = $request->slug;
        }

        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;

        $book->description = $request->description;
        $book->translator_id = $request->translator_id;

        $book->isbn = $request->isbn;
        $book->quantity = $request->quantity;


        // $book->is_approved = 1;
        // $book->user_id = 1;

        $book->save();
        //Image upload


        if ($request->image) {

            if (File::exists('images/books/' . $book->image)) {
                File::delete('images/books/' . $book->image);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time() . '-' . $book->id . '.' . $ext;
            $path = "images/books";
            $file->move($path, $name);
            $book->image = $name;
            $book->save();
        }
        $book_author = BookAuthor::where('book_id', $book->id)->get();
        foreach ($book_author as $author) {
            $author->delete();
        }

        foreach ($request->author_ids as $id) {
            $book_author = new BookAuthor();
            $book_author->book_id = $book->id;
            $book_author->author_id = $id;
            $book_author->save();
        }


        session()->flash('success', 'A Book Updated Success');

        return redirect()->route('users.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookDelete($id)
    {
        $book = Book::find($id);
        if (!is_null($book)) {
            if (!is_null($book->image)) {
                $file_path = "images/books/" . $book->image;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $book_authors = BookAuthor::where('book_id', $book->id)->get();
            foreach ($book_authors as $author) {
                $author->delete();
            }
            $book->delete();
        }
        session()->flash('success', 'A Book has deleted success');
        return back();
    }
}
