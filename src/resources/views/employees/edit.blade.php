@extends('layouts.layout')

@section('content')
    <form class="row g-3" method="post" action="{{ route('employee.update')}}">
        @method('PATCH') 
        @csrf
         @foreach($employee as $value)
            <div class="col-md-8">
                    <label for="employeeName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="employee" require value="{{$value->employee_name}}">
                     <input type="text" class="form-control" name="id"  value="{{$value->id}}" hidden>
                </div>
                 <div class="col-md-8">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" name="salary" value="{{$value->salary}}">
                </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
    @endforeach    
</form>
@endsection