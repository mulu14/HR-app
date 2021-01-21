<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
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
    public function testSeePageheadTest()
    {
        $this->get('/')->assertSee('Departments'); 

    }
    /**
     * A basic functional save departement
     *
     * @return void
     */
    public function testDepartmentSaveWithEmptyInputfield()
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
    public function testEmployeeIndexpage()
    {
        //$response = $this->call('GET', 'department.index'); 
        $response = $this->get('/employees/index');

        $response
            ->assertStatus(200); 
    }
}
