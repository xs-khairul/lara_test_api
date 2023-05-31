@extends('layouts.app')

@section('content')
 <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Auhtors Add Page') }}</div>

                <div class="card-body">
                    <form action="{{route('books.update',[$book])}}" method="post">
                     @csrf
                     @method("PUT")
                     <div class="form-group">
                        <label for="name">Book Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$book->name}}" />
                     </div>
                      <div class="form-group">
                        <label for="price" >Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$book->price}}"/>
                     </div>
                      <div class="form-group">
                        <label for="pages">Pages</label>
                        <input type="text" class="form-control" name="pages" id="pages" value="{{$book->pages}}"/>
                     </div>
                      <div class="form-group">
                        <label for="name">Author</label>
                        <select class="form-control" id="author_id" name="author_id">
                            <option value="">Select Author</option>
                            @forelse ($authors as $author)
                                <option value="{{$author->id}}"
                                    @if($author->id == $book->author_id) selected @endif >{{$author->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                     </div>
                     
                     
                        <button type="submit" class="btn btn-info mt-3"> Update</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
