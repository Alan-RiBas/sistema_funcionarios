<?php

namespace Tests\Feature;

use App\Enums\DepartmentEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateEmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_an_employee()
    {
        $response = $this->post(route('employees.store'), [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'cpf' => '12345678901',
            'age' => 30,
            'department' => DepartmentEnum::TECNOLOGIA->value,
        ]);

        $response->assertRedirect(route('employees.index'));
        $this->assertDatabaseHas('employees', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'cpf' => '12345678901',
            'age' => 30,
            'department' => DepartmentEnum::TECNOLOGIA->value,
        ]);
    }
}
