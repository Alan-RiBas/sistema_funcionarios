@extends('welcome')
@section('content')

    <h1 class="text-primary">Departamentos</h1>
    <h5>Pesquisar departamentos</h5>
    @livewire('search-users')
    <div class="d-flex justify-content-between align-items-center">
        <div class="p">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDepartment">
                Cadastrar Departamento
            </button>
            <div class="modal fade" id="createDepartment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                @livewire('create-employee')
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success mt-4 mr-4 col-12" role="alert">
                    {{ session('message') }}
                </div>
            @endif

        </div>

    </div>
<div>
    <h2>Departamentos</h2>
    @isset($departments)
        <table class="table table-striped">
            <thead class="bg-primary">
                <tr>
                    <th class="col-4">Id</th>
                    <th class="col-4">Departamento</th>
                    <th class="col-4">Visualizar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                    <tr>
                        <th class="col-4">{{ $department->id }}</th>
                        <td class="col-4">{{ $department->name }}</td>
                        <td class="col-4">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listEmployees" wire:click="selectDepartment({{ $department->id }})"><i class="bi bi-eye"></i></button>
                            <div class="modal fade" id="listEmployees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                @livewire('department-employees', ['departmentId' => $department->id])
                            </div>
                            {{-- <button wire:click="select" class="btn btn-secondary dropdown-toggle"type=" button" data-bs-toggle="dropdown" aria-expanded="false" >Listar</i></button>
                            @isset($selectedDepartmentId)
                                <h1>$selectedDepartmentId</h1>
                               @livewire('department-employees', ['departmentId' => $selectedDepartmentId])
                            @endisset --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $departments->links() }}
    @endisset
</div>


@endsection
