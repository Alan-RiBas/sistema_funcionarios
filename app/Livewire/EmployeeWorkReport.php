<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeWorkReport extends Component
{
    public $employees;

    public function mount()
    {
        $this->employees = Employee::with('department', 'workSchedules')->get();
    }

    public function render()
    {
        return view('livewire.employee-work-report', [
            'employees' => $this->employees,
        ]);
    }
}
