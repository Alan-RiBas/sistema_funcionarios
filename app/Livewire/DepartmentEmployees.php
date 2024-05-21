<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class DepartmentEmployees extends Component
{
    public $departmentId ="";
    public $employees = [];

    protected $listeners = ['showEmployees'];

    // public function selectDepartment($departmentId)
    // {
    //     $this->departmentId = $departmentId;
    //     // $this->departmentId = $departmentId;
    //     // $this->dispatchBrowserEvent('show-employee-modal');
    // }

    public function render()
    {
        $this->employees = Employee::where('department_id', $this->departmentId)->get();
        return view('livewire.departments.department-employees', ['departmentId' => $this->departmentId, 'employees' => $this->employees]);
    }
}
