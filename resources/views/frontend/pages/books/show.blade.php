@extends('frontend.layouts.app')

@section('content')

<div class="main-content">

  <div class="book-show-area">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          
          <img src="{{ asset('images/books/book.jpg') }}" class="img img-fluid" />
        </div>
        <div class="col-md-9">
          <h3>Java Programming</h3>
          <p class="text-muted">Written By 
            <span class="text-primary">Herbert Scheild</span> @<span class="text-info">Programming</span>
          </p>
          <hr>
          <p><strong>Uploaded By: </strong> Polash Rana</p>
          <p><strong>Uploaded at: </strong> 2 months ago</p>
          <div class="book-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>

          <div class="book-buttons mt-4">
              <a href="" class="btn btn-outline-success"><i class="fa fa-check"></i> Already Read</a>
              <a href="book-view.html" class="btn btn-outline-warning"><i class="fa fa-cart-plus"></i> Add to Cart</a>
              <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i> Add to Wishlist</a>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection