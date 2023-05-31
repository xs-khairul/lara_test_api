<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel project 

this project is for rest api for student and testing unit testing route and api testing 

## step and coding structure in code 

some example of testing and related code r in testing file 

## must change the db setting for testing environment 

## example 

```php
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

```

