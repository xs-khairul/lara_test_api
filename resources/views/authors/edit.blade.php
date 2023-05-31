@extends('layouts.app')

@section('content')
 <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Auhtors Add Page') }}</div>

                <div class="card-body">
                    <form action="{{route('authors.update',[$author])}}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="name">Auhtor Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$author->name}}" />
                     </div>
                     
                     
                        <button type="submit" class="btn btn-info mt-3"> Update</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
