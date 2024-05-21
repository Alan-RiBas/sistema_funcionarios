<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'cpf', 'age', 'department_id'];

    protected $casts = [
        'age' => 'integer',
        'department' => 'array'
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
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


    public function workSchedules()
    {
        return $this->hasMany(WorkSchedule::class);
    }
}
