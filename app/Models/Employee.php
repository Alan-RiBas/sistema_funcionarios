<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'cpf', 'age', 'department_id'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function createWorkSchedule(Carbon $startDate, $days)
    {
        // Iterar sobre os próximos dias
        for ($i = 0; $i < $days; $i++) {
            $date = $startDate->copy()->addDays($i);

            // Verificar se é um dia útil (segunda a sexta-feira)
            if ($date->isWeekday()) {
                // Criar o agendamento de trabalho para este dia
                $this->workSchedules()->create([
                    'date' => $date,
                    // Defina outras informações do agendamento de trabalho, se necessário
                ]);
            }
        }

        
    }
    
    public function getTotalWorkHours()
    {
        $totalMinutes = 0;

        foreach ($this->workSchedules as $schedule) {
            $start = Carbon::parse($schedule->work_date . ' ' . $schedule->start_time);
            $end = Carbon::parse($schedule->work_date . ' ' . $schedule->end_time);
            $totalMinutes += $end->diffInMinutes($start);
        }

        return round($totalMinutes / 60, 2); // Retorna o total de horas com duas casas decimais
    }


    public function workSchedules()
    {
        return $this->hasMany(WorkSchedule::class);
    }
}
