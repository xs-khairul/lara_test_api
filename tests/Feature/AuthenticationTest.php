<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class AuthenticationTest extends TestCase
{

    
    public function test_login_user_dashboard_test(){

        User::create([
            'name' => "hasib",
            'email' => "hasib@hasib.com",
            'password' => bcrypt("password"),
        ]);

        $response = $this->post('/login',[
            'email' => "hasib@hasib.com",
            'password' => bcrypt("password")
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

    }

    public function test_authors_page_auth_user(){
        $user     = User::factory()->create();
        $response = $this->actingAs($user)->get('/authors');
        $response->assertStatus(200);
    }

    public function test_books_page_auth_user(){
        $user     = User::factory()->create();
        $response = $this->actingAs($user)->get('/books');
        $response->assertStatus(200);
    }


    public function test_unauth_user_cant_go_authors_page()
    {
        $response = $this->get('/authors');
        $response->assertStatus(302);
        $response->assertRedirect('login');

    }

    public function test_unauth_user_cant_go_books_page()
    {
        $response = $this->get('/books');
        $response->assertStatus(302);
        $response->assertRedirect('login');

    }
}
