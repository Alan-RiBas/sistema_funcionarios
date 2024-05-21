<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createEmployeeModalLabel">Funcionarios do departamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                {{$departmentId}}
                @isset($employees)
                    @foreach($employees as $employee)
                        <li class="list-group-item">{{ $employee->name }} ({{ $employee->email }})</li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>
