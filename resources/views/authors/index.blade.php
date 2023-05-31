@extends('layouts.app')

@section('content')
 <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Auhtors Index') }}</div>

                <div class="card-body">
                    <a href="{{route('authors.create')}}" class="btn btn-primary"> Create New Author </a>

                    <div class="mt-3">
                        <ul class="list-group">
                            @forelse ($authors as $author)
                                 <li class="list-group-item">{{$author->name}} || Total Books :  {{count($author->books)}}
                                    <span class="d-flex justify-content-end">
                                        <a href="{{route('authors.edit',[$author])}}" class="btn btn-sm btn-warning" style="margin-right: 5px;">Edit</a>
                                         <form action="{{route('authors.destroy',[$author])}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                         </form>
                                    </span>
                                    
                                </li>
                            @empty
                                <li class="list-group-item">No date Added yet</li>
                            @endforelse
                            
                        </ul>
                    </div>
               
                </div>
            </div>
        </div>
@endsection
