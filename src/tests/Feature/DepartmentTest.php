<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\DepartmentsController; 

class DepartmentTest extends TestCase
{
    /**@test*/

    public function test_a_department_can_be_added_to_hr()
    {
       $response =  $this->post('/department', [
            'department_name' => 'Accounting'
        ]);

        $response->assertOk();
    }
}
