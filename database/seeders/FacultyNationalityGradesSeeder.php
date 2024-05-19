<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultyNationalityGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the faculty names and university IDs you want to filter by
        $facultyNames = [
            'كليه العلاج الطبيعي', 
            'كليه الطب البيطري', 
            'كليه الهندسه', 
            'كليه الفنون الجميله', 
            'كليه الحاسبات والمعلومات'
        ];
        $universityIds = [9, 13, 17, 18, 29];

        // Retrieve the faculty IDs based on the specified conditions
        $facultyIds = DB::table('faculties')
            ->whereIn('name', $facultyNames)
            ->whereIn('university_id', $universityIds)
            ->pluck('id');

        // Iterate over the retrieved faculty IDs
        foreach ($facultyIds as $facultyId) {
            // Insert records for each nationality ID
            for ($nationalityId = 6; $nationalityId <= 26; $nationalityId++) {
                DB::table('faculty_nationality_grades')->insert([
                    'nationality_id' => $nationalityId,
                    'faculty_id' => $facultyId,
                    'degree' => '65' // Replace with your actual degree
                ]);
            }
        }
    }
}
