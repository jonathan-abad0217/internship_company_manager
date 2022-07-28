@extends('layout')

<title> 
    Create company
    </title>
<section class="text-center">
    <h1> Company Manager</h1>
</section>
@section('content')

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2> Add Company</h2>

<form class="form bg-white p-6 border-1" method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label class="text-sm" for="name">Name</label>
        <input class="form-control" cols="30" rows="5"type="text" id="name" value="{{ old('name') }}" name="name">
        @error('name')
            <div class="form-error">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label class="text-sm" for="email">Email Address</label>
        <input class="form-control" cols="30" rows="5" type="text" id="email" name="email"  value="{{ old('email') }}">
        @error('email')
            <div class="form-error">
                {{ $message }}
            </div>
        @enderror
    </div>
  
   <div class="form-group">
    <label for="exampleFormControlFile1" class="text-sm">Choose Image File </label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
   </div>
    <div>
        <label class="text-sm" for="website">Website</label>
        <input class="form-control" cols="30" rows="5"type="text" id="website" name="website" value="{{ old('website') }}">
        @error('website')
            <div class="form-error">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <br>
        <button class=" btn btn-outline-secondary" type="submit">Submit</button>
    </div>
</form>
        
</div>
@endsection