@extends('layouts.layout')

@section('content') 
 <div class="col-sm-4 p-2">
    <h2>Employee</h2>
 </div>
 @if (count($employees) === 0)
 <div class="col-sm-4 p-2">
       @include('employees.add')
 </div>
  @elseif (count($employees) > 0)
    <div class="col-sm-12 p-2">   
      <table class="table table-striped table-dark">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Salary</td>
              <td colspan = 3>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->employee_name}}</td>
                <td>{{$employee->salary}}</td>
                <td><a class="btn btn-primary" href="{{ route('employee.show',$employee->id)}}"  type="submit">Detail</a></td>
                <td><a class="btn btn-primary" href="{{ route('employee.edit',$employee->id)}}"  type="submit">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('employee.destroy', $employee->id)}}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table> 
      <div class="d-flex justify-content-between">
         @include('employees.add')
      </div>
        
    </div>
  @endif
@endsection