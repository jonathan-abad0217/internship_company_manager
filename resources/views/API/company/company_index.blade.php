@extends('layout')
<title> 
    Company
    </title>
    <section class="text-center">
        <h1> Company Manager</h1>
    </section>
    @section('content')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table table-bordered table-hover">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Name</span></th>
                                <th><span>Email</span></th>
                                <th><span>Website</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
    
        
    @if (count($companies) > 0)

        @foreach ($companies as $company)
        <tr>
            <td>
               <span> <img src="{{ asset('storage/images/companies//'.$company->image) }}" height="70" width="70" alt="image" title="image">
                {{$company['name']}}<span>
            </td>
            
            <td>
                <span> {{$company['email']}}</span>
            </td>
            <td>
                {{$company['website']}}
            </td>
            <td style="width: 20%;">
            
                        <a href="companies/{{$company->id}}/edit"class="btn btn-secondary">Edit</a>
                        <a href="/companies/delete/{{$company->id}}"class="btn btn-danger">Delete</a>
            </div>
        </div>
        @endforeach
        
    @else
        <h2>There are no company to display</h2>
    @endif

    <div>
    
    </div>
    <br>
    <br>

</div>
@endsection