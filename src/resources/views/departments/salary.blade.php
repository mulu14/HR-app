
@if (isset($salaries))
    <div class="col-sm-12 p-2">   
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <td>Departments</td>
                <td>Max salary</td>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries as $salary)
                <tr>
                    <td>{{$salary->department_name}}</td>
                    <td>{{$salary->max_salary?? 0}}</td>
                </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
@endif