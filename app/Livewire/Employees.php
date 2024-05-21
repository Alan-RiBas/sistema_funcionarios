<?php

namespace App\Livewire;


use App\Models\Employee;
use Livewire\Component;

class Employees extends Component
{

    public $search = '';

    public function render()
    {

        $listEmployees = Employee::with('department')->paginate(10);

        return view('livewire.employees.index',[
            'employees' => $listEmployees
        ]);
    }


}
