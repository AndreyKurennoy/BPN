<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use JWTAuth;

class ApiCollectionsTest extends TestCase
{
    public function testGetAllCollectionsSuccess()
    {
//        $user = factory(User::class)->create([
//            'email' => 'testuser@mail.com',
//            'password' => bcrypt('test1234')
//        ]);
//        $payload = ['email' => 'testuser@mail.com', 'password' => 'test1234'];
//        $token = JWTAuth::attempt($payload);
//        $this->json('get', '/api/collections', ['token' => $token])
        $this->json('get', '/api/collections')
            ->assertStatus(200)
            ->assertJsonStructure([
               'collections' => [
                   [
                       'id',
                       'warranty',
                       'weight',
                       'size',
                       'length_of_sheets',
                       'quantity_of_sheets',
                       'quantity_of_boxes',
                       'protrusion',
                       'wind_min',
                       'wind_max',
                       'angle',
                       'description',
                       'description_title',
                       'name'
                   ]
               ]
            ]);
//
//        $newUser = new User();
//        $newUser->destroy($user->id);
    }

    public function testGetOneCollectionSuccess()
    {
        $this->json('get', '/api/collection/1')
            ->assertStatus(200)
            ->assertJsonStructure([
                'collections' => [

                    'id',
                    'warranty',
                    'weight',
                    'size',
                    'length_of_sheets',
                    'quantity_of_sheets',
                    'quantity_of_boxes',
                    'protrusion',
                    'wind_min',
                    'wind_max',
                    'angle',
                    'description',
                    'description_title',
                    'name'

                ]
            ]);
    }

    public function testgetUnexistedCollection()
    {
        $this->json('get', '/api/collection/9999')
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Collection not found!'
            ]);
    }

//    public function testCreateCollectionSuccess()
//    {
//
//        $data = [
//            'id',
//            'warranty',
//            'weight',
//            'size',
//            'length_of_sheets',
//            'quantity_of_sheets',
//            'quantity_of_boxes',
//            'protrusion',
//            'wind_min',
//            'wind_max',
//            'angle',
//            'description',
//            'description_title',
//            'name'
//        ];
//
//        $this->json('post', '/api/collection')
//            ->assertStatus(201)
//            ->assertJsonStructure([
//                'collections' => [
//
//                    'id',
//                    'warranty',
//                    'weight',
//                    'size',
//                    'length_of_sheets',
//                    'quantity_of_sheets',
//                    'quantity_of_boxes',
//                    'protrusion',
//                    'wind_min',
//                    'wind_max',
//                    'angle',
//                    'description',
//                    'description_title',
//                    'name'
//
//                ]
//            ]);
//    }
}
