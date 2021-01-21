<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\DepartmentsController; 

class DepartmentTest extends TestCase
{


   /**
     * Departement with empty input field fail validation
     *
     * @return void
     */
    public function test_department_can_not_save_with_empty_input_field()
    {

        $response = $this->json('POST', '/department', ['department_name' => '']);

        $response
            ->assertStatus(422); 
    }
     /**
     * The department page has head tag
     *
     * @return void
     */
    public function test_department_index_page_has_head_tag()
    {

        $response = $this->get('/'); 
                       
        $response
            ->assertStatus(200)
            ->assertSee('department')
            ->assertSuccessful();  
    }
     /**
     * The department can be deleted
     *
     * @return void
     */
    public function test_department_can_be_deleted()
    {
        $response = $this->delete('/department/{id}', [
            'id' => 1
        ]); 

          $response
            ->assertRedirect('http://localhost'); 
    }
     /**
     * The department can be created
     *
     * @return void
     */
    public function test_department_can_be_created()
    {
        $response = $this->post('/department', [
            'department_name' => "newName"
        ]); 

          $response
            ->assertRedirect('/department/create'); 
    }
     /**
     * The department can be updated
     *
     * @return void
     */
    public function test_department_can_be_updated()
    {
        $response = $this->patch('/department/update', [
            'department_name' => "newName", 
            'id' => 1
        ]); 

          $response
            ->assertRedirect('http://localhost'); 
    }
     /**
     * The department page has max salary
     *
     * @return void
     */
    public function test_department_max_salary()
    {
        $response = $this->post('/employees', [
            'employee_name' => "Cool", 
            'salary' => 1000, 
            'department_id' => 2
        ]); 

       $max = DepartmentsController::getHighestSalary(); 
        $this->assertEquals(1, count($max));
    }
    /**
     * The department page has max salary
     * 
     * @return void
     */
    public function test_department_max_over_fifty_thousand()
    {
         $response = $this->post('/employees', [
            'employee_name' => "Alex", 
            'salary' => 650000, 
            'department_id' => 1
        ]); 
         $response = $this->post('/employees', [
            'employee_name' => "Dave", 
            'salary' => 550000, 
            'department_id' => 1
        ]); 
       $max = DepartmentsController::getOverfiftythousand(); 
        $this->assertEquals(2, count($max));
    }
}
