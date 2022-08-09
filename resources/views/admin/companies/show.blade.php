@extends('layout')
<title> 
    Company
    </title>
    <section class="text-center">
        <h1> Company Manager</h1>
    </section>
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div>
        <h3>
            <a><img src="{{ asset('storage/images/companies//'.$companies->image) }}" height="100px" alt="image" title="image"></a>
            {{$companies['name']}}
        </h3>
        <ul>
               Email Address: {{$companies['email']}}<br>
                Website: {{$companies['website']}}
        </ul>
                <h4> Employees </h4>
                @if (count($companies->employees) > 0)
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
                                            <th><span>Phone</span></th>
                                            <th>&nbsp;</th>
                                            @else
                                            <h2>There are no employee to display</h2>
                                        @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                   
            @foreach($companies->employees as $employee)
          
            <tr>
                <td style="vertical-align: middle;">
                    <span>{{$employee['employee_first_name']}} {{$employee['employee_last_name']}}</span>
                </td>
              
                <td style="vertical-align: middle;">
                    <span>{{$employee['email']}}</span>
                </td>
                <td style="vertical-align: middle;">
                    <span>{{$employee['phone']}}</span>
                </td>
                <td style="width: 20%;">
                            
                <a href="employees/{{$employee->id}}/edit" class="btn btn-secondary">Edit</a>
                <a href="/employees/delete/{{$employee->id}}" class="btn btn-danger">Delete</a>
        
                </div>
            @endforeach
     

     
    
</div>
</div>
@endsection