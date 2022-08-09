        @extends('layout')

        <title> 
            Add employee
            </title>
        <section class="text-center">
            <h1> Employee</h1>
        </section>
        @section('content')

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h2> Add Employee</h2>

        <form class="form bg-white p-6 border-1" method="POST" action="{{ route('employees.store') }}">
            {{ csrf_field() }}
            <div>
                <label class="text-sm" for="employee_first_name">First name</label>
                <input class="form-control" cols="30" rows="5" type="text" @error('employee_first_name') is-invalid @enderror" id="employee_first_name" name="employee_first_name"  value="{{ old('employee_first_name') }}"required autocomplete="employee_first_name" autofocus>
                @error('employee_first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div>
                <label class="text-sm" for="employee_last_name">Last name</label>
                <input class="form-control" cols="30" rows="5" type="text" @error('employee_last_name') is-invalid @enderror" id="employee_last_name" name="employee_last_name"  value="{{ old('employee_last_name') }}"required autocomplete="employee_last_name" autofocus>
                @error('employee_last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div>
            <label class="text-sm" for="company">Company</label>
        <br>
        <select  id="company_id" name="company_id" @error('company_id') is-invalid @enderror" class="form control input-sm" for="company_id" required autocomplete="company_id" autofocus>
            <option value="">Select Company</option>
            @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        @error('company_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                </span>
                    @enderror
            </div>
        <div>
            <label class="text-sm" for="email">Email Address</label>
            <input class="form-control" cols="30" rows="5" type="text"  @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email') }}"required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        <div>
            <label class="text-sm" for="phone">Phone number</label>
            <input class="form-control" cols="30" rows="5" type="text" @error('phone') is-invalid @enderror" id="phone" name="phone"  value="{{ old('phone') }}"required autocomplete="phone" autofocus>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
       
                
                <button class=" btn btn-outline-secondary" type="submit">Submit</button>
            </div>
        </form>
                
        </div>
        @endsection