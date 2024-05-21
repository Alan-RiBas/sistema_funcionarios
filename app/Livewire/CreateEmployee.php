<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;

class CreateEmployee extends Component
{

    public $name;
    public $age;
    public $cpf;
    public $department_id;
    public $email;

    public $departments;

    public function mount()
    {
        $this->departments = Department::all()->pluck('name', 'id');
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'cpf' => 'required|string|max:11|unique:employees,cpf',
            'department_id' => 'required|exists:departments,id',
            'email' => 'required|email|max:255|unique:employees,email',
        ]);
        Employee::create([
            'name' => $this->name,
            'age' => $this->age,
            'cpf' => $this->cpf,
            'department_id' => $this->department_id,
            'email' => $this->email,
        ]);

        // Reset form fields
        $this->reset(['name', 'age', 'cpf', 'department_id', 'email']);

        session()->flash('message', 'Funcionario cadastrado com sucesso.');
        redirect(route('employees'));
    }


    public function render()
    {
        return view('livewire.create-employee');
    }
}
