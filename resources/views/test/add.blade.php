@extends('templates.layout')
@section('content')
@if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
@if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
   <form action="{{ url('/add-student') }}" method="POST">
       @csrf
        <input type="text" name="name" value="">
         <input type="text" name="email" value="">
       <button type="submit" class="btn btn-primary"> Save</button>
   </form>
@endsection
