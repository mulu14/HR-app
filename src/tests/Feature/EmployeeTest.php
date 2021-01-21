<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\DepartmentsController; 

class EmployeeTest extends TestCase
{
    /**
     * A basic functional see employeed page head tag 
     *
     * @return void
     */
    public function test_employee_index_page_has_header()
    {
        //$response = $this->call('GET', 'department.index'); 
        $response = $this->get('/employees/index'); 
                       
        $response
            ->assertStatus(200)
            ->assertSee('Employee')
            ->assertSuccessful();  
    }

}
