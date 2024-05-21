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
    protected $signature = 'work-schedule:create {employee_id}';

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
        $employee = Employee::find($this->argument('employee_id'));

        if (!$employee) {
            $this->error('Employee not found.');
            return;
        }

        $startDate = Carbon::now();
        WorkSchedule::createWorkSchedule($employee, $startDate);

        $this->info('Work schedule created successfully.');
    }
}
