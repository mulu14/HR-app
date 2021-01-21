@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form class="row g-3" method="post" action="{{route('employee.store')}}"> 
                {{csrf_field()}}
                <div class="col-md-8">
                    <label for="employeeName" class="form-label">Employee</label>
                    <input type="text" class="form-control" name="employee" require>
                </div>
                 <div class="col-md-8">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" name="salary" require>
                </div>
                <div  class="col-md-8"> 
                    @if(count($departments) > 0)
                        <select class="form-control"  name="department_id">
                            <option selected>Choose department</option>
                            @foreach ($departments as $department)
                                <option value="{{$department -> id}}">{{$department -> department_name}}</option>
                            @endforeach
                        </select>
                    @endif
                     @if (count($departments) === 0)
                        <div class="alert alert-danger col-md-8 mt-3" role="alert">
                            <p>Department required create at least one</p>  
                        </div>
                    @endif
                    
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
        </form>
         @if (session()->get('employeecreated') !== null)
            <div class="alert alert-success col-md-6 mt-3" role="alert">
                <p>{{session()->get('employeecreated')}}</p>  
            </div>
         @endif
        </div>
    </div>
</div>
@endsection