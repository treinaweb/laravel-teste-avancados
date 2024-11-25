<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_verifica_o_status_e_se_o_nome_e_mostrado_corretamente(): void
    {
        //Arrange

        //Act
        $response = $this->get('/users');

        //Asserts
        $response->assertStatus(200);
        $response->assertSee('Olá, Elton');
    }
}
