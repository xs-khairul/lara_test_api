@extends('layouts.app')

@section('content')
 <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Auhtors Index') }}</div>

                <div class="card-body">
                    <a href="{{route('books.create')}}" class="btn btn-primary"> Create New Books </a>

                    <div class="mt-3">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Pages</th>
                                <th>Author Name</th>
                                <th>Actions</th>
                            </tr>
                            
                                @forelse ($books as $item)
                                
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->pages}}</td>
                                    <td>{{$item->author->name}}</td>
                                    <td>
                                        <span class="d-flex justify-content-end">
                                            <a href="{{route('books.edit',[$item])}}" class="btn btn-sm btn-warning" style="margin-right: 5px;">Edit</a>
                                            <form action="{{route('books.destroy',[$item])}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </span>
                                    </td>
                                 
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        No date Added yet
                                    </td>
                                </tr>
                                @endforelse


                        </table>
                    </div>
               
                </div>
            </div>
        </div>
@endsection
