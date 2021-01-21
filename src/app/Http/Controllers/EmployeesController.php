<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Show the list of employee
     *
     * @param  void
     * @return \Illuminate\View\View
     */

    public function index() 
    {
        $employees = DB::table('employees')->get();
        return view('employees.index', ['employees' => $employees]); 
    }

    /**
     * Create a new emmployee
     *
     * @param  void
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departments = DB::table('departments')->get();
        return view('employees.create', ['departments' => $departments]); 
    }

    
    /**
     * Store a new employee
     *
     * @param  Request  $request
     * @return void
     */
     public function store(Request $request)
    {
        $request->validate([
            'employee'=>'required',
            'salary' => 'required', 
            'department_id' => 'required',
        ]);

        DB::table('employees')->insertOrIgnore(
            [
                'employee_name' =>  $request->get('employee'), 
                'department_id' =>   $request->get('department_id'),
                'salary' =>   $request->get('salary')
            ]
        );

        return redirect()->route('employee.index');
    }
    
    /**
     * Edit the given employee
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = DB::table('employees')
                        ->where('id', '=', $id)
                        ->get(); 
    
        return view('employees.edit', compact('employee'));
    }

    /**
     * Edit the given employee
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $employee = DB::table('employees')
                        ->where('id', '=', $id)
                        ->get(); 
    
        return view('employees.detail', compact('employee'));
    }

    /**
     * Update the given employee
     *
     * @param  Request  $request
     * @return  \Illuminate\View\View
     */

    public function update(Request $request)
    {
        $request->validate([
            'employee'=>'required',
            'salary' => 'required', 
            'id' => 'required',
        ]);

        DB::table('employees')
            ->where('id', '=', $request->get('id'))
            ->update(
                ['employee_name' => $request->get('employee'),
                 'salary' => $request->get('salary')
                ]
            );
        
        return redirect()->route('employee.index');
    }

   /**
     * Delete the given division
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employees')->where('id', '=', $id)->delete();
        return redirect()->route('employee.index');
    }

   
}
