<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiRegisterTest extends TestCase
{
    public function testRegisterRequiresEmailNamePassword()
    {
        $this->json('POST', 'api/user')
            ->assertStatus(422)
            ->assertJson([
                'email' => ['The email field is required.'],
                'password' => ['The password field is required.'],
                'name' => ['The name field is required.']
            ]);
    }

    public function testRegisterSuccess()
    {
        $payload = [
            'email' => 'petrovasiliev1278@mail.com',
            'password' => 'test1234',
            'name' => 'PetroVasiliev'
        ];

        $this->json('POST', 'api/user', $payload)
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Successfully created user!'
            ]);

        User::where('email', '=', 'petrovasiliev1278@mail.com')->delete();
    }
}
