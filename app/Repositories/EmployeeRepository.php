<?php

namespace App\Repositories;

use App\Employee;
use App\Repositories\BaseRepository;

/**
 * Class StateRepository
 * @package App\Repositories
 * @version June 6, 2020, 6:55 am UTC
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }
}
