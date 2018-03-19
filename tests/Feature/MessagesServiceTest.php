<?php

namespace Tests\Feature;

use App\Models\Messages;
use App\Services\MessagesService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory;

class MessagesServiceTest extends TestCase
{
    public function testSaveMessage()
    {
        $faker = Factory::create();
        $data = [
            'name' => $faker->name(),
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'message' => $faker->sentence(5),
            'diller' => 1
        ];

        $messageService = new MessagesService();
        $message = $messageService->saveMessage($data);
        $this->assertArraySubset($data, $message['attributes']);

        Messages::destroy($message->id);
    }
}
