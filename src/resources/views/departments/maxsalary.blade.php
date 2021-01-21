<div class="list-group">
    @foreach($maxSalaries as $max)
        <li class="list-group-item">{{$max->department_name}} :  {{$max->frequency}} </li>
    @endforeach
</div>