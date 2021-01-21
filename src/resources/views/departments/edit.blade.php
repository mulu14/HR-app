@extends('layouts.layout')

@section('content')
    <form class="row g-3" method="post" action="{{ route('department.update')}}">
        @method('PATCH') 
        @csrf
         @foreach($department as $value)
            <div class="col-md-6">
                <label for="departmentName" class="form-label">Department</label>
                <input type="text" class="form-control" name="department" value="{{$value->department_name}}">
                <input type="text" class="form-control" name="id" hidden value="{{$value->id}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
    @endforeach    
</form>
@endsection