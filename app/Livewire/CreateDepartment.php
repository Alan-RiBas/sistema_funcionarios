<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class CreateDepartment extends Component
{
    public $name;
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);
        try{
            Department::create([
                'name' => $this->name,
            ]);

        }catch(\Exception $e){
            session()->flash('message', 'Erro ao cadastrar departamento.');
            report($e);
        }

        // Reset form fields
        $this->reset(['name']);

        session()->flash('message', 'Departamento cadastrado com sucesso.');
        redirect(route('departments'));
    }

    public function render()
    {
        return view('livewire.departments.create-department');
    }
}
