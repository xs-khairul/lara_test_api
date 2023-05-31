@extends('layouts.app')

@section('content')
 <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Auhtors Add Page') }}</div>

                <div class="card-body">
                    <form action="{{route('authors.store')}}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="name">Auhtor Name</label>
                        <input type="text" class="form-control" name="name" id="name" />
                     </div>
                     
                     
                        <button type="submit" class="btn btn-info mt-3"> Submit</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
