@extends('frontend.layouts.app')

@section('content')

<div class="main-content">

  <div class="book-show-area">
    <div class="container">
      <div class="row">

        <div class="col-md-3">

          <img class="d-block w-100" src="{!! asset('images/books/'.$books->image) !!}" alt="First slide">
     
       </div>
        <div class="col-md-9">
         Book Name: {{$books->title}}
          <p class="text-muted">Written By 
            <span class="text-primary">{{$books->user->username }}</span> @<span class="text-info">{{$books->category->name}}</span>
          </p>
          <hr>
          <p><strong>Uploaded By: </strong>{{$books->publisher->name }}</p>
          <p><strong>Uploaded at: </strong> {{$books->created_at}}</p>
          <div class="book-description">
            {{$books->description}}
        
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