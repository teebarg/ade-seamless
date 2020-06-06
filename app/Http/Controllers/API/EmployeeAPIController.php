<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Requests\API\CreateEmployeeAPIRequest;
use App\Http\Requests\API\UpdateEmployeeAPIRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\API
 */

class EmployeeAPIController extends AppBaseController
{
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of the Employee.
     * GET|HEAD /countries
     *
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        $countries = $this->employeeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($countries->toArray(), 'Countries retrieved successfully');
    }

    /**
     * Store a newly created Employee in storage.
     * POST /countries
     *
     *
     * @param CreateEmployeeAPIRequest $request
     * @return
     */
    public function store(CreateEmployeeAPIRequest $request)
    {
        $input = $request->all();

        $employee = $this->employeeRepository->create($input);

        return $this->sendResponse($employee->toArray(), 'Employee saved successfully');
    }

    /**
     * Display the specified Employee.
     * GET|HEAD /countries/{id}
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError('Employee not found');
        }

        return $this->sendResponse($employee->toArray(), 'Employee retrieved successfully');
    }

    /**
     * Update the specified Employee in storage.
     * PUT/PATCH /countries/{id}
     *
     * @param int $id
     * @param UpdateEmployeeAPIRequest $request
     *
     * @return
     */
    public function update($id, UpdateEmployeeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError('Employee not found');
        }

        $employee = $this->employeeRepository->update($input, $id);

        return $this->sendResponse($employee->toArray(), 'Employee updated successfully');
    }

    /**
     * Remove the specified Employee from storage.
     * DELETE /countries/{id}
     *
     * @param int $id
     *
     * @return
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError('Employee not found');
        }

        $employee->delete();

        return $this->sendSuccess('Employee deleted successfully');
    }
}
