@extends('layout')
<br>
<title> 
    Employees
    </title>
    <section class="text-center">
        <h1> Company Manager</h1>
    </section>
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
                                <th><span>Company Name</span></th>
                                <th><span>Email</span></th>
                                <th><span>Phone</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
    
    
    @if (count($employees) > 0)
    
        @foreach ($employees as $employee)
        
        <tr>
            <td>
                <span>{{$employee['employee_first_name']}} {{$employee['employee_last_name']}}</span>
            </td>
            <td>
                <span>{{$employee->companies->name}}</span>
            </td>
            <td>
                <span>{{$employee['email']}}</span>
            </td>
            <td>
                <span>{{$employee['phone']}}</span>
            </td>
            <td style="width: 20%;">
                        
                        <a href="employees/{{$employee->id}}/edit" class="btn btn-secondary">Edit</a>
                        <a href="/employees/delete/{{$employee->id}}" class="btn btn-danger">Delete</a>
                  
            </div>
        @endforeach
       
    @else
        <h2>There are no employee to display</h2>
    @endif

    <div>
        
    </div>
    <br>
    <br>
    {{ $employees->links() }}
</div>
@endsection