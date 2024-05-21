<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeWorkReport extends Component
{
    public $employees;

    
    public function render()
    {
        $this->employees = Employee::with('department', 'workSchedules')->get();
        return view('livewire.employee-work-report', [
            'employees' => $this->employees,
        ]);
    }
}
