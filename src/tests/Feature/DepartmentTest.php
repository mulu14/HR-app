<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\DepartmentsController; 

class DepartmentTest extends TestCase
{


   /**
     * A basic functional save departement with empty input field
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
     * A basic functional see department page head tag
     *
     * @return void
     */
    public function test_department_index_page_has_header()
    {

        $response = $this->get('/'); 
                       
        $response
            ->assertStatus(200)
            ->assertSee('department')
            ->assertSuccessful();  
    }
}
