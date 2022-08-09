@extends('layout')

<title> 
   Edit employee
    </title>
<section class="text-center">
    <h1> Employee</h1>
</section>
@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2> Edit Employee</h2>

            <form class="form bg-white p-6 border-1" method="POST" action="{{ route('employees.update', $employee->id) }}">
     @csrf
    <div>
    <label class="text-sm" for="company">Company</label>
<br>
<select name="company_id" class="form control">
@foreach($companies as $company)
<option value="{{ $company->id }}"{{ $employee->company_id == $company->id ? 'selected': '' }}> {{ $company->name }} </option>
@endforeach
</select>
    </div>
    <div>
    <label class="text-sm" for="employee_first_name">First name</label>
    <input class="form-control" cols="30" rows="5" type="text" id="employee_first_name" name="employee_first_name"  value="{{ $employee->employee_first_name }}">
    @error('employee_first_name')
        <div class="form-error">
            {{ $message }}
        </div>
    @enderror
</div>
<div>
    <label class="text-sm" for="employee_last_name">Last name</label>
    <input class="form-control" cols="30" rows="5" type="text" id="employee_last_name" name="employee_last_name"  value="{{ $employee->employee_last_name }}">
    @error('employee_last_name')
        <div class="form-error">
            {{ $message }}
        </div>
    @enderror
    </div>
<div>
<label class="text-sm" for="email">Email Address</label>
<input class="form-control" cols="30" rows="5" type="text" id="email" name="email"  value="{{ $employee->email }}">
@error('email')
    <div class="form-error">
        {{ $message }}
    </div>
@enderror
</div>
<div>
<label class="text-sm" for="phone">Phone number</label>
<input class="form-control" cols="30" rows="5" type="text" id="phone" name="phone"  value="{{ $employee->phone }}">
@error('phone')
    <div class="form-error">
        {{ $message }}
    </div>
@enderror
</div>

    <button class=" btn btn-outline-secondary" type="submit">Submit</button>
</div>
</form>
    
</div>
@endsection