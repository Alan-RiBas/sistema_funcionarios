<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            EmployeeSeeder::class,
            DepartmentSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'teste2@example.com',
        ]);
    }
}
