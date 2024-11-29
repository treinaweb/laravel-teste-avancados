<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutenticacaoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_o_usuario_autenticado_deve_acessar_a_rota_com_sucesso(): void
    {
        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        //Act
        $response = $this->get('/protegida', [
            'Accept' => 'application/json'
        ]);

        //Asserts
        $response->assertOk()
                ->assertSeeText('Rota acessada com sucesso');
    }

    public function test_o_usuario_visitante_nao_deve_acessar_a_rota()
    {
        //Act
        $response = $this->get('/protegida', [
            'Accept' => 'application/json'
        ]);

        //Asserts
        $response->assertUnauthorized()
                ->assertDontSeeText('Rota acessada com sucesso');
    }
}
