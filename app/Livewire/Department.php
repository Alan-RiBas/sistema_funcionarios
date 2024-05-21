<?php

namespace App\Livewire;

use App\Models\Department as DepartmentModel;
use Livewire\Component;


class Department extends Component
{
    public $departmentId = "";
    
    public function selectDepartment($departmentId)
    {
       return $this->departmentId = $departmentId;
    }

    public function render()
    {
        return view('livewire.departments.department', [
            'departments' => DepartmentModel::paginate(15)
        ]);
    }
}
