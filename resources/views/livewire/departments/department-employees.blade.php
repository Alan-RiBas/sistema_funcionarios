<ul class="dropdown-menu">
    @if($employees)
        @foreach($employees as $employee)
            <li class="dropdown-item">{{ $employee->name }} | ({{ $employee->email }})</li>
        @endforeach
    @endif
</ul>
