<?php

    $faker = Faker\Factory::create();

    function insertUsers()
    {
        global $faker;
        $amount = 3000000;
        $amount = 0;
        for ($i=1; $i<=$amount; $i++) {
            echo insert('users', [
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]) 
            . "\n"
            ;
        }

        $total = 2954449;
        $count = 300000;
        $count = 0;
        for ($i=1; $i<=$count; $i++) {
            echo insert('addresses', [
                'uid' => rand(1, $total),
                'city' => $faker->city,
            ]) 
            . "\n"
            ;
        }

        $total = 2954449;
        $count = 300000;
        $count = 0;
        for ($i=1; $i<=$count; $i++) {
            echo insert('cards', [
                'uid' => rand(1, $total),
                'type' => $faker->creditCardType,
            ]) 
            . "\n"
            ;
        }
    }
?>