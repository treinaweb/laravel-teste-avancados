<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class SessionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_deve_adicionar_item_corretamente_no_carrinho(): void
    {
        //Arrange
        $item = [
            'id' => 1001,
            'qtd' => 10
        ];

        //Act
        $response = $this->post('/cart', $item);

        //Asserts
        $this->assertEquals([$item], Session::get('cart_items'));

        $response->assertOk()
                ->assertSeeText('item adicionado com sucesso');
    }
}
