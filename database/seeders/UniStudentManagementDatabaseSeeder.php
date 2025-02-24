<?php

namespace Modules\UniStudentManagement\Database\Seeders;

use Illuminate\Database\Seeder;

class UniStudentManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               \Modules\UniStudentManagement\Models\UsmSettings::create(
            ['key' => 'year_of_record'],
            ['value' => 2025]
        );
    }
}
