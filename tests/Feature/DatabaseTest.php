<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_verifica_se_consegue_criar_o_usuario_com_sucesso(): void
    {
        //Arrange
        $data = [
            'name' => 'Elton',
            'email' => 'elton.fonseca@treinaweb.com.br',
            'password' => 'asdasdasd'
        ];

        //Act
        $this->post('/users', $data);

        //Asserts
        $this->assertDatabaseCount('users', 1);
    }

    public function test_verifica_se_consegue_criar_o_usuario_com_sucesso2(): void
    {
        //Arrange
        $data = [
            'name' => 'Elton',
            'email' => 'elton.fonseca@treinaweb.com.br',
            'password' => 'asdasdasd'
        ];

        //Act
        $this->post('/users', $data);

        //Asserts
        $this->assertDatabaseCount('users', 1);
    }
}
