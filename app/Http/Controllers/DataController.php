<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function view($id = null)
    {
        return $id ? Employee::find($id) : Employee::all();
    }

    public function store(Request $req)
    {
        // $input = $req->all();
        // $result = Employee::create($input);

        $employee = new Employee;
        $employee->emp_name = $req->emp_name;
        $employee->emp_code = $req->emp_code;
        $result = $employee->save();

        if ($result) {
            return ['Result' => 'Data Added!!'];
        } else {
            return ['Result' => 'Data Not Added!!'];
        }
    }

    public function update(Request $req)
    {
        $employee = Employee::find($req->id);
        $employee->emp_name = $req->emp_name;
        $employee->emp_code = $req->emp_code;
        $result = $employee->save();

        if ($result) {
            return ['Result' => 'Data Updated!!'];
        } else {
            return ['Result' => 'Data Not Updated!!'];
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return ['Result' => 'This ' . $id . ' is Deleted!!'];
    }

    public function search($keyword)
    {
        return Employee::where('emp_name', 'like', '%'.$keyword.'%')->get();
    }
}
