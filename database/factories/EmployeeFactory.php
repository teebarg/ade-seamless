<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $employee_status = ['full time', 'part time'];
    $status = ['test period', 'worker'];
    $title = ['Product Manager', 'Tester', 'Business Analyst', 'Software Engineer'];
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'employee_status' => $faker->randomElement($employee_status),
        'status' =>  $faker->randomElement($status),
        'title' => $faker->randomElement($title),
        'employment_date' => $faker->date(),
        'salary' => $faker->randomFloat(),
        'raise' => $faker->numberBetween(-50, 500),
    ];
});
