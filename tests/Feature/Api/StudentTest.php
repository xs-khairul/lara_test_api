<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase; /// call to refresh whole db for test
    ## change test db settings from xml file or .eve.testing file 

    public function test_student_index_with_no_data_api()
    {

        $response = $this->get('/api/students');
        $response->assertStatus(404);
        $response->assertSee(__("No records found"));
    }

    public function test_student_add_faild_validation_api()
    {
        $response = $this->post('/api/students',[
            'name' => "lkhairul",
            'course' => "lkhairul",
            'email' => "lkhairul",
            'phone' => "lkhairul",

        ]);
        $response->assertStatus(422);
        $response->assertSee(__("The phone must be 10 digits."));
    }
    public function test_student_add_successfull_api()
    {
        $response = $this->post('/api/students',[
            'name' => "lkhairul",
            'course' => "lkhairul",
            'email' => "lkhairul",
            'phone' => "0121212145",

        ]);
        $response->assertStatus(200);
        $response->assertSee(__("Student created successfully"));
    }


}
