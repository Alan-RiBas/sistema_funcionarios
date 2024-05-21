<div>
    <h2>Relatório de Horários de Trabalho dos Funcionários</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Departamento</th>
                <th>Carga Horária Total</th>
                <th>Horas Trabalhadas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->cpf }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>{{ $employee->getTotalWorkHours() }} horas</td>
                    <td>
                        <ul>
                            @foreach($employee->workSchedules as $schedule)
                                <li>{{ $schedule->work_date }}: {{ $schedule->start_time }} - {{ $schedule->end_time }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
