<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController  extends Controller
{
    /**
     * @var $request
     */
    private static $request; 
    
    /**
     * class constructor 
     * @param  Request  $request
     */
    function __construct(Request $request) {
        self::$request = $request;  
    }
    /**
     * Show the list of resources
     *
     * @param  void
     * @return \Illuminate\View\View
     */
    public static function index() 
    {
        $departments = DB::table('departments')->get(); 
        $salaries = self::getHighestSalary(); 
        $maxSalaries = self::getOverfiftythousand(); 
        return view('departments.index', [
            'departments' => $departments, 
            'salaries' => $salaries, 
            'maxSalaries' => $maxSalaries
            ]); 
    }

    /**
     * Create a new department
     *
     * @param  void
     * @return \Illuminate\View\View
     */
    public static function create() 
    {
        return view('departments.create'); 
    }

    /**
     * Store a new department
     *
     * @return  \Illuminate\View\View
     */
    public static function store()
    {
        self::$request->validate([
                'department_name'=>'required',
            ]); 

        $query = DB::table('departments')
                   ->where('department_name', '=', self::$request->get('department_name'))
                   ->get();

        if (count($query) > 0) {
            $data = 'Duplicated department is not allowed';
            return redirect()->route('department.create')->with('data', $data);
        }

       $q =  DB::table('departments')->insertOrIgnore(
            ['department_name' => self::$request->get('department_name')]
        );

        $created = 'New department is created';
        return redirect()->route('department.create')->with('created', $created);
    }

    /**
     * Edit the given department
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public static function edit($id)
    {
        $department = DB::table('departments')
                        ->where('id', '=', $id)
                        ->get(); 
    
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the given department
     *
     * @return  \Illuminate\View\View
     */
    public static function update()
    {

        self::$request->validate([
            'department'=>'required',
            'id'=>'required',
        ]);

        DB::table('departments')
            ->where('id', '=',  self::$request->get('id'))
            ->update(['department_name' =>  self::$request->get('department')]);
        
       return redirect()->route('department.index');
    }

    /**
     * Delete the given department
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        DB::table('departments')->where('id', '=', $id)->delete();
       return redirect()->route('department.index');
    }

   /**
     * Return department where salary is greater than  50000 and 
     * The number of occurrences are more than one 
     * @param  void
     * @return array 
     */
    public static function getOverfiftythousand() 
    {

        $query =  DB::select(
            "SELECT
                d.department_name,
                count(d.id) as frequency
            FROM
                employees e
                RIGHT JOIN departments d
                    ON d.id = e.department_id
            WHERE
                e.salary > 50000
            GROUP BY
                d.id
            HAVING  frequency >= 2
            "); 
        
        return $query; 
    }

    /**
     * Return the highest salary from each department
     * 
     * @param  void
     * @return array 
     */
    public static function getHighestSalary() 
    {
      $query =  DB::select(
            "SELECT
                department_name,
                MAX(salary) max_salary
            FROM
            employees e
                RIGHT JOIN departments d
                    ON d.id = e.department_id
            GROUP BY
                d.id
            UNION
            SELECT
                department_name,
                salary
            FROM
                employees e
                    RIGHT JOIN departments d
                        ON d.id = e.department_id
            WHERE 
                salary IS NULL"); 
    
        return $query; 
    }


}
