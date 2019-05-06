<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_login()
    {
        $this->withoutMiddleware();

        $user = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => bcrypt('password'),
        ]);

        $response->assertRedirect('/');
    }

    /** @test */
    public function a_user_cannot_login_with_wrong_password()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => bcrypt('wrong_password'),
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_must_register_with_a_approved_email_domain()
    {
        $approved_user = factory(User::class)->make([
            'email' => 'email@us.af.mil'
        ]);

        $not_approved_user = factory(User::class)->make([
            'email' => 'email@notapproveddomain.com'
        ]);

        $approved_response = $this->post('/register', [
            'first_name' => $approved_user->first_name,
            'last_name' => $approved_user->last_name,
            'email' => $approved_user->last_name,
            'password' => bcrypt('password'),
        ]);

        $not_approved_response = $this->post('/register', [
            'first_name' => $not_approved_user->first_name,
            'last_name' => $not_approved_user->last_name,
            'email' => $not_approved_user->email,
            'password' => bcrypt('password'),
        ]);

        $approved_response->assertRedirect('/');

        $not_approved_response->assertRedirect('/register');
    }
}
