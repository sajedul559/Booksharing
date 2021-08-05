@extends('frontend.layouts.app')

@section('content')

<div class="main-content">

  <div class="book-show-area">
    <div class="container">
      @include('frontend.layouts.partials.message')
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
              {{-- <a href="" class="btn btn-outline-success"><i class="fa fa-check"></i> Already Read</a>
              <a href="book-view.html" class="btn btn-outline-warning"><i class="fa fa-cart-plus"></i> Add to Cart</a>
              <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i> Add to Wishlist</a> --}}
              @auth
              @if (!is_null(App\User::requestBook($books->id)))
              <span class="badge  badge-success" style="padding: 12px; border-radius:0px; font-sixe: 14px;">
                <i class="fa fa-check"></i> Already Requested

              </span>
              @if (App\User::requestBook($books->id)->status == 1)
              <a href="#requestupdateModal{{$books->id }}" class="btn btn-outline-success" data-toggle="modal"><i class="fa fa-check " ></i> Update Request </a>
              <a href="#requestdeleteModal{{$books->id }}" class="btn btn-outline-danger" data-toggle="modal"><i class="fa fa-times " ></i> Delete Request </a>

                <!--  Request Delete Modal -->
                <div class="modal fade" id="requestdeleteModal{{$books->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Request Modal For Book Name : <mark class="btn btn-outline-success">{{$books->title }}</mark></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('books.request.delete',  App\User::requestBook($books->id)->id)}}" method="POST">
                          @csrf
                          <p>
                           Delete request to the owner of this book ? 
                          </p>
                          {{-- <textarea name="user_message" id="user_message"  rows="5" class="form-control"  > {{ App\User::requestBook($books->id)->user_message}}</textarea> --}}
                          <button type="submit" class="btn btn-success mt-4"> <i class="fa fa-send"></i>Delete request  </button>
                          <button type="button" class="btn btn-secondary mt-4" data-dismiss="modal">Cancel</button>

                        </form>
                      </div>
                  
                    </div>
                  </div>
                </div>




             
                <!--  Request Update Modal -->
                <div class="modal fade" id="requestupdateModal{{$books->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Updaet Modal For Book Name : <mark class="btn btn-outline-success">{{$books->title }}</mark></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('books.request.update',  App\User::requestBook($books->id)->id)}}" method="POST">
                          @csrf
                          <p>
                           Update request to the owner of this book ? 
                          </p>
                          <textarea name="user_message" id="user_message"  rows="5" class="form-control"  > {{ App\User::requestBook($books->id)->user_message}}</textarea>
                          <button type="submit" class="btn btn-success mt-4"> <i class="fa fa-send"></i>Update request  </button>
                          <button type="button" class="btn btn-secondary mt-4" data-dismiss="modal">Cancel</button>

                        </form>
                      </div>
                  
                    </div>
                  </div>
                </div>

                  
                  
              @endif
              @else
              <a href="#requestModal{{$books->id}}" class="btn btn-outline-success" data-toggle="modal"><i class="fa fa-check " ></i> Send Request</a>

                  
              @endif
                  
              @endauth


                                   
                  <!--  Request Modal -->
                  <div class="modal fade" id="requestModal{{$books->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Semd Reqiest Modal For Book Name : <mark class="btn btn-outline-success">{{$books->title }}</mark></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('books.request', $books->slug)}}" method="POST">
                            @csrf
                            <p>
                              Send a request to the owner of this book ?
                            </p>
                            <textarea name="user_message" id="user_message"  rows="5" class="form-control" placeholder="Enter your message to the owner" ></textarea>
                            <button type="submit" class="btn btn-success mt-4"> <i class="fa fa-send"></i>Send Request Now </button>
                            <button type="button" class="btn btn-secondary mt-4" data-dismiss="modal">Cancel</button>

                          </form>
                        </div>
                    
                      </div>
                    </div>
                  </div>

                  

          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection