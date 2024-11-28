<?php

namespace Tests\Feature;

use App\Models\User;
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
        $this->assertDatabaseHas('users', [
            'name' => 'Elton',
            'email' => 'elton.fonseca@treinaweb.com.br',
        ]);
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

    public function test_verifica_se_os_usuarios_sao_listados_corretamente()
    {
        //Arrange
        $users = [
            [
                'name' => 'Elton',
                'email' => 'elton.fonseca@treinaweb.com.br',
                'password' => 'asdasdasd'
            ],
            [
                'name' => 'Maria',
                'email' => 'maria.fonseca@treinaweb.com.br',
                'password' => 'asdasdasd'
            ],
        ];

        User::insert($users);

        //Act
        $response = $this->get('/users');

        //Asserts
        $response->assertOk()
                ->assertViewIs('clients.index')
                ->assertViewHas('users')
                ->assertSeeText($users[0]['email'])
                ->assertSeeText($users[1]['email']);
    }
    
    public function test_verifica_se_os_usuarios_sao_listados_corretamente2()
    {
        //Arrange
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        //Act
        $response = $this->get('/users');

        //Asserts
        $response->assertOk()
                ->assertViewIs('clients.index')
                ->assertViewHas('users')
                ->assertSeeText($user1->email)
                ->assertSeeText($user2->email);
    }

    public function test_verifica_se_a_paginacao_tem_a_quantidade_de_itens_correto()
    {
        //Arrange
        $this->seed();
        // User::factory(10)->create();

        //Act
        $response = $this->get('/users');

        //Asserts
        $response->assertOk()
                ->assertViewIs('clients.index')
                ->assertViewHas('users', function($users){
                    return $users->count() === 5;
                });
    }

    public function test_verifica_se_consegue_apagar_um_usuario_do_banco_corretamente()
    {
        //Arrange
        $user = User::factory()->create();

        //Act
        $this->delete("/users/$user->id");

        //Asserts
        $this->assertModelMissing($user);
        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
        $this->assertDatabaseCount('users', 0);
    }
}
