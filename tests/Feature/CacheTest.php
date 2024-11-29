<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CacheTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_deve_retornar_os_produtos_em_cache(): void
    {
        //Arrange
        $products = [
            ['id' => 1, 'name' => 'Carrinho'],
            ['id' => 2, 'name' => 'Bicicleta'],
        ];

        Cache::shouldReceive('get')
                ->once()
                ->with('products', [])
                ->andReturn($products);

        //Act
        $response = $this->get('/products');

        //Assert
        $response->assertOk()
                ->assertJson($products);
    }

    public function test_deve_retornar_um_array_vazio_quando_nao_tiver_produto_no_cache(): void
    {
        //Act
        $response = $this->get('/products');

        //Assert
        $response->assertOk()
                ->assertJson([]);
    }
}
