<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(DisciplinesTableSeeder::class);
        $this->call(ExperiencesTableSeeder::class);
        $this->call(MedicalstaffTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(QualificationsTableSeeder::class);
        $this->call(QualificationtypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SpecialitiesTableSeeder::class);
        $this->call(StaffevaluationTableSeeder::class);
        $this->call(TemplcatglinkTableSeeder::class);
        $this->call(TemplevaludetTableSeeder::class);
        $this->call(TemplevalumstTableSeeder::class);
        $this->call(TrainingcoursesTableSeeder::class);
    }
}
