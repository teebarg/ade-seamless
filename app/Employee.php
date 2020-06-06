<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'employee_status' => 'required|in:full time,part time',
        'title' => 'required',
        'status' => 'required|in:test period,worker',
        'salary' => 'required|numeric',
        'employment_date' => 'required|date',
        'raise' => 'sometimes|required|numeric',
    ];
}
