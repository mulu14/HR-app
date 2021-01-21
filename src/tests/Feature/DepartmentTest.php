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
}
