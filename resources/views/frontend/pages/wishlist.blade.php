@extends('frontend.layouts.app')


@section('content')

<div class="main-content">







  

  <div class="book-list-sidebar">
    <div class="container">
      <div class="row">

        <div class="col-md-9">
          <h3>Wishlish Book</h3>
          @include('frontend.layouts.partials.message')


          @foreach($wishlists as $wishlist)

          @php($book=App\Book::where('id',$wishlist->book_id)->first())
          

          
          <div class="col-md-4 float-left">
            <div class="single-book">
              <img src="{{asset('images/books/'.$book->image)}}" alt="">
              <div class="book-short-info">
                <h5>{{ $book->title }}  </h5>
                <p>
                  <a href="{{route('users.profile', $book->user->username)}}" class=""> <i class="fa fa-upload"></i>{{ $book->user->username}}</a>
                </p>
                 

                @if($wishlist->book_id == $book->id )

                <form action="{{route('wishlist_remove', $wishlist->id)}}">
                    <button href="" class="btn btn-outline-danger"> <i class="fa fa-heart">Remove Wishlist</i></button>

                </form>

                 <form action="{{route('wishlist_add', $book->id)}}">
               <a href="{{route('books.show', $book->slug)}}" class="btn btn-outline-primary"><i class="fa fa-eye">View</i></a>  
                


                 @else
                 <button href="" class="btn btn-outline-danger"> <i class="fa fa-heart">Wishlist</i></button>


                 @endif

      
      
                </form>
                     
              </div>
            </div>
          </div>
          
          
          @endforeach

         {{-- <div class="books-pagination mt-5">
           {{$book->links() }}
         </div> --}}



           

          

        </div> <!-- Book List -->

        @include('frontend.pages.books.partials.category_sidebar')

      </div>
    </div>
  </div>
</div>

@endsection