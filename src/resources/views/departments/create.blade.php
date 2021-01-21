@extends('layouts.layout')

@section('content')
    <form class="row g-3" method="post" action="{{ route('department.store')}}">
        {{csrf_field()}}
        <div class="col-md-6">
            <label for="departmentName" class="form-label">Departement</label>
            <input type="text" class="form-control" name="department_name">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
</form>
    @if (session()->get('data') !== null)
        <div class="alert alert-danger col-md-4 mt-3" role="alert">
          <p>{{session()->get('data')}}</p>  
        </div>
    @endif
     @if (session()->get('created') !== null)
        <div class="alert alert-success col-md-4 mt-3" role="alert">
          <p>{{session()->get('created')}}</p>  
        </div>
    @endif
@endsection