<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HRappTest extends TestCase
{
   /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
     /**
     * A basic test example.
     *
     * @return void
     */
    public function test_see_page_head()
    {
        $this->get('/')->assertSee('Departments'); 

    }
    /**
     * A basic functional save departement
     *
     * @return void
     */
    public function test_department_can_not_save_with_empty_input_field()
    {
        $response = $this->json('POST', '/department', ['department' => '']);

        $response
            ->assertStatus(422); 
    }
    /**
     * A basic functional save departement
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
