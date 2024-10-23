<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'employee_name' => $request->employee_name,
            'employee_lastname' => $request->employee_lastname,
            'employee_title' => $request->employee_title,
            'employee_bio' => $request->employee_bio,
            'employee_status' => $request->employee_status,
        ]);
        if ($employee) {
            return response()->json([
                'success' => true,
                'message' => 'Employee added',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee could not be added',
            ]);
        }
    }

    public function index()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return new EmployeeResource($employee);
    }

    public function update(Request $request, $id)
    {

        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found',
            ]);
        }

        if ($request->employee_name) {
            $employee->employee_name = $request->employee_name;
        }
        if ($request->has('employee_lastname')) {
            $employee->employee_lastname = $request->employee_lastname;
        }
        if ($request->has('employee_title')) {
            $employee->employee_title = $request->employee_title;
        }
        if ($request->has('employee_bio')) {
            $employee->employee_bio = $request->employee_bio;
        }
        if ($request->has('employee_status')) {
            $employee->employee_status = $request->employee_status;
        }

        if ($employee->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Employee updated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee could not be updated',
            ]);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json([
            'success' => true,
            'message' => 'Employee deleted successfully',
        ]);
    }
}
