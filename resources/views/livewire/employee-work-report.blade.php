@extends('welcome')
@section('content')
<div>
    <h2 class="text-primary">Relatório de Horários de Trabalho dos Funcionários</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-2">Nome</th>
                <th class="col-2">CPF</th>
                <th class="col-2">Departamento</th>
                <th class="col-2">Carga Horária Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->cpf }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>{{ $employee->getTotalWorkHours() }} horas</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection