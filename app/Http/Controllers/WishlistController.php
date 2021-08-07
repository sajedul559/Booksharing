<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Book;

use Auth;

class WishlistController extends Controller
{
    public function wishlist_add($id)
    {

        $book = Book::find($id);
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->book_id = $book->id;
        $wishlist->save();
        return back()->with('success', 'Book added to Wishlist successfully!!');
    }

    public function wishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.pages.wishlist', compact('wishlists'));

        // return view('frontend.pages.wishlist');
    }

    public function wishlist_remove($id)
    {
        $wishlist = wishlist::find($id);
        $wishlist->delete();
        return redirect()->back()->with('success', 'wishList remove successfully');
    }
    public function wishlist_test($user_id)
    {
        $wishlists = Wishlist::find($user_id);

        return view('frontend.pages.wishtest', compact('wishlists'));
    }
}
