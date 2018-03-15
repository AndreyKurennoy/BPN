<?php

namespace Tests\Feature;

use App\Models\collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use JWTAuth;

use Faker\Factory;

class ApiCollectionsTest extends TestCase
{
    public function testGetAllCollectionsSuccess()
    {
        $user = factory(User::class)->create([
            'email' => 'testuser@mail.com',
            'password' => bcrypt('test1234')
        ]);
        $payload = ['email' => 'testuser@mail.com', 'password' => 'test1234'];
        $token = JWTAuth::attempt($payload);

        $this->json('get', '/api/collections', ['token' => $token])
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

        User::destroy($user->id);
    }

    public function testGetCollectionsWithoutToken()
    {
        $this->json('get', '/api/collections')
            ->assertStatus(400)
            ->assertJson([
                'error' => 'Error fetching token!'
            ]);
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

    public function testCreateCollectionSuccess()
    {
        $faker = Factory::create();
        $data = [
            'warranty' => $faker->sentence(2),
            'weight' => $faker->sentence(2),
            'size' => $faker->sentence(2),
            'length_of_sheets' => $faker->sentence(2),
            'quantity_of_sheets' => $faker->sentence(2),
            'quantity_of_boxes' => $faker->sentence(2),
            'protrusion' => $faker->sentence(2),
            'wind_min' => $faker->sentence(2),
            'wind_max' => $faker->sentence(2),
            'angle' => $faker->sentence(2),
            'description' => $faker->sentence(2),
            'description_title' => $faker->sentence(2),
            'name' => $faker->sentence(2)
        ];

        $collection = $this->json('post', '/api/collection', $data )
            ->assertStatus(201)
            ->assertJsonStructure([
                'collection' => [

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
            ])
            ->decodeResponseJson();

        collection::destroy($collection['collection']['id']);
    }

    public function testUpdateCollectionSuccess()
    {
        $collection = \factory(collection::class)->create();
        $collection->name = 'TEST';

        $this->json('put', '/api/collection/'. $collection->id, $collection['attributes'] )
            ->assertStatus(201)
            ->assertJsonStructure([
                'collection' => [

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

        collection::destroy($collection->id);
    }

    public function testDeleteCollectionSuccess()
    {
        $collection = \factory(collection::class)->create();

        $this->json('delete', '/api/collection/'. $collection->id)
            ->assertStatus(200)
            ->assertJson([

                'message' => 'Collection deleted!'

            ]);
    }
}
