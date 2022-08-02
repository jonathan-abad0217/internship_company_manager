        @extends('layout')

        <title> 
            Add employee
            </title>
        <section class="text-center">
            <h1> Employee</h1>
        </section>
        @section('content')

        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h2> Add Employee</h2>

        <form class="form bg-white p-6 border-1" method="POST" action="{{ route('employees.store') }}">
            {{ csrf_field() }}
            <div>
                <label class="text-sm" for="employee_first_name">First name</label>
                <input class="form-control" cols="30" rows="5" type="text" id="employee_first_name" name="employee_first_name"  value="{{ old('employee_first_name') }}">
                @error('employee_first_name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label class="text-sm" for="employee_last_name">Last name</label>
                <input class="form-control" cols="30" rows="5" type="text" id="employee_last_name" name="employee_last_name"  value="{{ old('employee_last_name') }}">
                @error('employee_last_name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
            <label class="text-sm" for="company">Company</label>
        <br>
        <select  id="company_id" name="company_id" class="form control input-sm" for="company_id">
            <option value="">Select Company</option>
            @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        @error('company_id')
                <div class="form-error">
                    {{ "Please choose your company." }}
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
        <div>
            <label class="text-sm" for="phone">Phone number</label>
            <input class="form-control" cols="30" rows="5" type="text" id="phone" name="phone"  value="{{ old('phone') }}">
            @error('phone')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <br>
                <br>
                <button class=" btn btn-outline-secondary" type="submit">Submit</button>
            </div>
        </form>
                
        </div>
        @endsection