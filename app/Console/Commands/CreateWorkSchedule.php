<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use App\Models\WorkSchedule;
use Carbon\Carbon;

class CreateWorkSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work-schedule:create {employee_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create work schedule for an employee for the next 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $employeeId = $this->argument('employee_id');
        $startDate = Carbon::now();

        if ($employeeId) {
            $employee = Employee::find($employeeId);

            if (!$employee) {
                $this->error('Employee not found.');
                return;
            }

            WorkSchedule::createWorkSchedule($employee, $startDate);
            $this->info('Work schedule created successfully for employee ID: ' . $employeeId);
        } else {
            $employees = Employee::all();

            foreach ($employees as $employee) {
                WorkSchedule::createWorkSchedule($employee, $startDate);
            }

            $this->info('Work schedules created successfully for all employees.');
        }
    }
}
