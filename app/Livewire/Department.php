<?php

namespace App\Livewire;

use App\Models\Department as DepartmentModel;
use App\Models\Employee;
use Livewire\Component;


class Department extends Component
{


    public function selectDepartment($departmentId)
    {
        $this->emit('showEmployees', $departmentId);
        
    }

    public function render()
    {
        
        return view('livewire.departments.department', [
            'departments' => DepartmentModel::paginate(15)
        ]);
    }
}
