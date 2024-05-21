<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'work_date', 'start_time', 'end_time'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public static function createWorkSchedule($employee, $startDate, $days = 30)
    {
        $workHours = [
            ['start' => '09:00:00', 'end' => '12:00:00'],
            ['start' => '13:00:00', 'end' => '18:00:00'],
        ];

        for ($i = 0; $i < $days; $i++) {
            $currentDate = (clone $startDate)->addDays($i);
            if ($currentDate->isWeekday()) {
                foreach ($workHours as $hours) {
                    self::create([
                        'employee_id' => $employee->id,
                        'work_date' => $currentDate->format('Y-m-d'),
                        'start_time' => $hours['start'],
                        'end_time' => $hours['end'],
                    ]);
                }
            }
        }
    }
}
