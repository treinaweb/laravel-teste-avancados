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
}
