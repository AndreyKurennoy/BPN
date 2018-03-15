<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiLoginTest extends TestCase
{
    public function testRequiresEmailAndPassword()
    {
        $this->json('POST', 'api/user/signin')
            ->assertStatus(422)
            ->assertJson([
                'email' => ['The email field is required.'],
                'password' => ['The password field is required.']
            ]);
    }

    public function testSignInSuccess()
    {
        $user = factory(User::class)->create([
            'email' => 'testuser1@mail.com',
            'password' => bcrypt('test1234')
        ]);

        $payload = ['email' => 'testuser1@mail.com', 'password' => 'test1234'];

        $this->json('POST', 'api/user/signin', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'token'
            ]);

        $newUser = new User();
        $newUser->destroy($user->id);
    }
}
