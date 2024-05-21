<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class DepartmentEmployees extends Component
{
    public $departmentId = "";
    public $employees = [];

    public function render()
    {
        $this->employees = Employee::where('department_id', $this->departmentId)->get();
        return view('livewire.departments.department-employees', ['employees' => $this->employees]);
    }
}
