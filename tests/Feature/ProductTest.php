<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'email' => $this->faker->email,
            'name' => $this->faker->firstName,
            'password' => bcrypt($this->password = 'secret'),
        ]);

//        $this->seed('ProductSeeder');


    }


    public function testProductsGetAll()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => []
        ]);
    }


    public function testProductCreate()
    {
//        $response = $this->get('/api/products');

        Passport::actingAs($this->user);

        $product = [
            'name' => 'Producto 1',
            'detail' => $this->faker->text(rand(5,15)),
            'price' => 3,
            'stock' => 10,
            'discount' => 10,
            'user_id' => $this->user->id
        ];

        $response = $this->postJson('/api/products', $product)
            ->assertStatus(201)
            ->assertJsonStructure([
//                'name',
//                'detail',
//                'price',
//                'stock',
//                'discount',
//                'user_id'
            ]);


        dump($response);

    }
}
