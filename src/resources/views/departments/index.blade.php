@extends('layouts.layout')

@section('content') 
<div class="col-sm-4 p-2">
    <h2>Departments</h2> 
 </div>  
 @if (count($departments) === 0)
 <div class="col-md-4 mt-3">
   <a href="/department/create" class="btn btn-primary">Add department</a>
  </div>
 @endif
  @if (count($departments) > 0)
    <div class="col-sm-12 p-2">
      <table class="table table-striped table-dark">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{$department->id}}</td>
                <td>{{$department->department_name}}</td>
                <td><a class="btn btn-primary" href="{{route('department.edit', $department->id)}}"  type="submit">Edit</a></td>
                <td>
                    <form method="post" action="{{route('department.destroy', $department->id)}}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table> 
      <div class="col-md-4 mt-3">
        <a href="/department/create" class="btn btn-primary">Add department</a>
      </div>
    </div>
  @endif
  @if(count($salaries) > 0)
    <div class="col-sm-12 p-2">
      <h2>Highest salary</h2>   
         @include('departments.salary', ['salaries' => $salaries])
    </div>
  @endif
  @if(count($maxSalaries) > 0)
    <div  class="col-sm-12 p-2">
      <h2>> 50,000</h2>   
       @include('departments.maxsalary', ['maxSalaries' => $maxSalaries])
    </div>
  @endif
@endsection

