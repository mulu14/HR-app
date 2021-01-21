<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{

     /**
     * @var $request
     */
    private $request; 
    
    /**
     * class constructor 
     * @param  Request  $request
     */
    function __construct(Request $request) {
        $this->request = $request;  
    }
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
     * @return void
     */
     public function store()
    {
        $this->request->validate([
            'employee'=>'required',
            'salary' => 'required', 
            'department_id' => 'required',
        ]);

        DB::table('employees')->insertOrIgnore(
            [
                'employee_name' =>  $this->request->get('employee'), 
                'department_id' =>   $this->request->get('department_id'),
                'salary' =>   $this->request->get('salary')
            ]
        );
        $employeecreated = "New employee created"; 
        return redirect()->route('employee.create')->with('employeecreated', $employeecreated );
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
     * Show the given employee
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
     * @return  \Illuminate\View\View
     */

    public function update()
    {
        $this->request->validate([
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
