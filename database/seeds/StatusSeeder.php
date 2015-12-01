<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statuses = array(
                ['name' => 'Pending'],
                ['name' => 'Completed'],
                ['name' => 'Canceled']
        );
            
        // Loop through each user above and create the record for them in the database
        DB::table('statuses')->insert($statuses);
    }
}
