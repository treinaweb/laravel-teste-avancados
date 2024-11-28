<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_mostra_a_tarefa_quando_os_dados_sao_validos(): void
    {
        //Arrage
        $tarefa = "Criar uma app incrivel e testada com Laravel";

        //Act
        $response = $this->post('/tasks', [
            'tarefa' => $tarefa
        ]);

        //Asserts
        $response->assertOk()
                 ->assertValid()
                 ->assertSeeText($tarefa);
    }

    public function test_deve_retornar_erro_de_validacao_quando_a_tarefa_nao_for_informada()
    {
         //Act
         $response = $this->post('/tasks', []);

         //Asserts
         $response->assertInvalid([
            'tarefa' => 'Preencha o campo tarefa'
         ]);
    }

    public function test_deve_retornar_erro_de_validacao_quando_a_tarefa_for_menor_do_que_o_esperado()
    {
        //Arrange
        $tarefaInvalida = 'Inva';

         //Act
         $response = $this->post('/tasks', [
            'tarefa' => $tarefaInvalida
         ]);

         //Asserts
         $response->assertInvalid([
            'tarefa' => 'Tamanho mínimo para a tarefa é 5 caracteres'
         ]);
    }
}
