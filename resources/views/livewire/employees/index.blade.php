
@extends('welcome')
@section('content')

    <h1 class="text-primary">Funcionários</h1>
    <h5>Pequisar funcionários:</h5>
    @livewire('search-users')
    <div class="d-flex justify-content-between align-items-center">
        <div class="p">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Cadastrar Funcionário
            </button>

            @if(session()->has('message'))
                <div class="alert alert-success mt-4 mr-4 col-12" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                @livewire('create-employee')
            </div>
        </div>

    </div>
<div class="mt-3 d-flex flex-column justify-content-between align-items-center">
    @isset($employees)
        <table class="table table-striped">
            <thead class="bg-primary">
                <tr>
                    <th class="col-3">Nome</th>
                    <th class="col-1">Idade</th>
                    <th class="col-3">CPF</th>
                    <th class="col-2">Departamento</th>
                    <th class="col-3">E-mail</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($employees as $employee )
                        <tr>
                            <th class="col-3">{{ $employee->name }}</th>
                            <td class="col-1">{{ $employee->age }}</td>
                            <td class="col-3">{{ $employee->cpf }}</td>
                            <td class="col-2">
                                @if ($employee->department)
                                    {{ $employee->department->name }}
                                @else
                                    Nenhum departamento associado
                                @endif
                            </td>
                            <td class="col-3">{{ $employee->email }}</td>
                        </tr>
                    @endforeach
            </tbody>

        </table>
        {{ $employees->links() }}
        @else

        <div class="alert alert-warning">
            Não há funcionários cadastrados!
        </div>
    @endisset
</div>
@endsection
