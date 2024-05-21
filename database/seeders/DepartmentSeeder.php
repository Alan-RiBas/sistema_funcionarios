<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = ['Tecnologia', 'Contabilidade', 'Comercial', 'Faturamento', 'Marketing'];

        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }
    }
}
