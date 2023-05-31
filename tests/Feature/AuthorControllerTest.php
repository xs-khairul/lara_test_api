<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    private User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
 
    //  GET|HEAD        authors 
    public function test_user_index_author_page()
    {
        $response = $this->actingAs($this->user)->get('/authors');
        $response->assertStatus(200);
    }


    // POST            authors
    public function test_author_post_by_auth_user()
    {
        $response = $this->actingAs($this->user)->post('/authors',[
            "name" => "hello test"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('authors');
    }

    public function test_author_post_by_unauth_user()
    {
        $response = $this->post('/authors',[
            "name" => "hello test unauth"
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }


//      ...................................................................................................................... authors.index › AuthorController@index
//    ...................................................................................................................... authors.store › AuthorController@store
//   GET|HEAD        authors/create ............................................................................................................. authors.create › AuthorController@create
//   GET|HEAD        authors/{author} ............................................................................................................... authors.show › AuthorController@show
//   PUT|PATCH       authors/{author} ........................................................................................................... authors.update › AuthorController@update
//   DELETE          authors/{author} ......................................................................................................... authors.destroy › AuthorController@destroy
//   GET|HEAD        authors/{author}/edit 


}
