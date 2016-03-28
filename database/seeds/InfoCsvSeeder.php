<?php

use Illuminate\Database\Seeder;
use App\Repository\CsvInfoRepository;

class InfoCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \File::put(storage_path(env('CSV_PATH')), '');
        $faker = Faker\Factory::create();
        $info = new CsvInfoRepository();
        for($i = 0; $i < 100; $i++) {
            $info->save([
                $faker->name, 
                rand(0, 1) ? 'male' : 'female', 
                $faker->phoneNumber, 
                $faker->email, 
                $faker->address, 
                $faker->country, 
                $faker->dateTimeThisCentury->format('Y-m-d'),
                rand(0, 1) ? 'Bachelor' : 'Master', 
                rand(0, 1) ? 'Phone' : 'Email', 
            ]);
        }
    }
}
