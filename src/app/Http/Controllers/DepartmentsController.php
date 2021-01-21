<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController  extends Controller
{
    /**
     * Show the list of resources
     *
     * @param  void
     * @return \Illuminate\View\View
     */
    public function index() 
    {
        $departments = DB::table('departments')->get(); 
        $salaries = $this->getSalary(); 
        $maxSalaries = $this->getMaxsalary(); 
        return view('departments.index', [
            'departments' => $departments, 
            'salaries' => $salaries, 
            'maxSalaries' => $maxSalaries
            ]); 
    }

    /**
     * Create a new division
     *
     * @param  void
     * @return \Illuminate\View\View
     */
    public function create() 
    {
        return view('departments.create'); 
    }

    /**
     * Store a new division
     *
     * @param  Request  $request
     * @return  \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
                'department'=>'required',
            ]); 

        $query = DB::table('departments')
                   ->where('department_name', '=', $request->get('department'))
                   ->get();

        if (count($query) > 0) {
            $data = 'Duplicated department is not allowed';
            return redirect()->route('department.create')->with('data', $data);
        }

        DB::table('departments')->insertOrIgnore(
            ['department_name' => $request->get('department')]
        );

         return redirect()->route('department.index');
    }

    /**
     * Edit the given division
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $department = DB::table('departments')
                        ->where('id', '=', $id)
                        ->get(); 
    
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the given division
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\View\View
     */
    public function update(Request $request)
    {

        $request->validate([
            'department'=>'required',
            'id'=>'required',
        ]);

        DB::table('departments')
            ->where('id', '=', $request->get('id'))
            ->update(['department_name' => $request->get('department')]);
        
       return redirect()->route('department.index');
    }

    /**
     * Delete the given division
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('departments')->where('id', '=', $id)->delete();
       return redirect()->route('department.index');
    }

   /**
     * Return divisions where salary is greater than  50000 and 
     * The number of occurrences are more than one 
     * @param  void
     * @return array 
     */
    public function getMaxsalary() 
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
     * Return the highest division salary 
     * 
     * @param  void
     * @return array 
     */
    public function getSalary() 
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
