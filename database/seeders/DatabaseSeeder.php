<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $super_admin = Role::create(['name' => 'super_admin']);
        $central_admin = Role::create(['name' => 'central_admin']);
        $sub_dean = Role::create(['name' => 'sub_dean']);
        $hod = Role::create(['name' => 'hod']);
        $lecturer = Role::create(['name' => 'lecturer']);
        $student = Role::create(['name' => 'student']);


        User::create([
            'name' => 'TTIHUB',
            'email' => 'ttihub@tasued.edu.ng',
            'password' => Hash::Make('12345'),
        ])->assignRole('super_admin');
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
