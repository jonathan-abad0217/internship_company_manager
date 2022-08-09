@extends('layout')

<title> 
   Edit company
    </title>
<section class="text-center">
    <h1> Company Manager</h1>
</section>
@section('content')

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2> Edit Company</h2>
                                                                 
            <form class="form bg-white p-6 border-1" method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                 @method ('PUT')
    
    <div>
        <label class="text-sm" for="name">Name</label>
        <input class="form-control" cols="30" rows="5"type="text" id="name" name="name" value="{{ $company->name }}">
        @error('name')
            <div class="form-error">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label class="text-sm" for="email">Email Address</label>
        <input class="form-control" cols="30" rows="5" type="text" id="email" name="email"  value="{{ $company->email }}">
        @error('email')
            <div class="form-error">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1" class="text-sm">Choose Image File </label>
        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
        <br>
        <img src="{{ asset('storage/images/companies//'.$company->image) }}" height="70px" alt="image" title="image">
       </div>
    <div>
        <label class="text-sm" for="website">Website</label>
        <input class="form-control" cols="30" rows="5"type="text" id="website" name="website" value="{{ $company->website }}">
        @error('website')
            <div class="form-error">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div>
        <br>
        <button class=" btn btn-outline-secondary" type="submit">Update</button>
    </div>
</form>
        
</div>
@endsection