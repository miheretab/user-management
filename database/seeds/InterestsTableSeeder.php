<?php

use App\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InterestsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $interests = ['Robotics', 'Biology', 'Airplane', 'Genetics'];
        $interest = Interest::where('name', $interests[0])->first();
        if ($interest === null) {
            foreach($interests as $interest) {
                Interest::create(array(
                    'name' => $interest
                ));
            }

        }

    }
}
