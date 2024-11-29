<?php

namespace Tests\Feature;

use App\Events\ImageProcessed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_deve_processar_uma_imagem_corretamente(): void
    {
        //Arrange
        Event::fake();

        //Act
        $response = $this->post('/products/images/process');

        //Assert
        $response->assertOk()
                ->assertSeeText('imagem processada com sucesso');

        Event::assertDispatched(ImageProcessed::class);
    }
}
