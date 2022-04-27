<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DataTables;


class EmployeeController extends Controller
{
       public  function index(Request $request){
              if ($request->ajax()) {
                 $data = Employee::latest()->get();
                     return Datatables::of($data)
                         ->addIndexColumn()
                         ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                            return $btn;
                         })
                         ->rawColumns(['action'])
                         ->make(true);
                 }
               
                 return view('employeesList');
       }
    public function store(Request $request)
 {
       $employee = new Employee([
       'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birth_date' => $request->birth_date,
        'sex' => $request->gender,
        'salary' => $request->salary,
       //  'super_id' => $request->supervisor,
       //  'branch_id' => $request->branch
        ]);
       $employee->save();
       return response()->json(['success'=>'Product saved successfully.']);
       //  return redirect('/');
 }
 public function create(){
    $employees = Employee::get();
    return view('employeesList') ->with(compact('employees'));
 }
 public function destroy($id)
 {
     Employee::find($id)->delete();
  
     return response()->json(['success'=>'Product deleted successfully.']);
 }
}
