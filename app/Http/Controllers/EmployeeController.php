<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'manager_id' => $request->get('manager_id'),
            'gender' => $request->get('gender'),
            'phone' => $request->get('phone'),
            'supermarket_id' => $request->get('supermarket_id')
        ]);

        //name, type, gender and manager
        $employee->save();

        return response()->json("success");
    }
    
    public function list()
    {
        $employees = DB::table('employees')
        ->orderBy('name', 'asc')
        ->get();

        $data['employees'] = $employees;

        return response()->json($data);
    }
    
    public function view(Request $request,string $id)
    {
        $employeeId = (int)$id;
        $employee = Employee::find($employeeId);
        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json("Record not found");
        }
    }
    
    public function delete(Request $request,string $id)
    {
        $employeeId = (int)$id;
        Employee::where('id', $employeeId)->delete();
        return response()->json('Success');
    }
    
    public function update(Request $request,string $id)
    {
        $employeeId = (int)$id;
        $employee =  Employee::find($employeeId);
        if ($employee != null) {
            $employee->name =$request->get('name');
            $employee->type = $request->get('type');
            $employee->gender = $request->get('gender');
            $employee->phone = $request->get('phone');
            $employee->manager_id = $request->get('manager_id');
            $employee->supermarket_id = $request->get('supermarket_id');
            $employee->save();

            $message = "Success";
        } else {
            $message = "Record not found!";
        }
        return response()->json($message);
    }
}
