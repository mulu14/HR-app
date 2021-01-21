@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="col-sm-6 p-2">
        <h2>Employee detail</h2>
    </div>
    <div class="col-md-8 mr-4">
        <ul class="list-group">
         @foreach($employee as $value)
            <li class="list-group-item">Name: {{$value->employee_name}}</li>
            <li class="list-group-item">Salary: {{$value->salary}}</li>
          @endforeach  
     </ul>  
     </div> 
</div>
@endsection