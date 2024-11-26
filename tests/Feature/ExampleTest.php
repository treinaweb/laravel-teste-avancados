<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_conhecendo_asserts_de_http(): void
    {
        $this->get('/status-ok')->assertOk();
        $this->get('/status-not-found')->assertNotFound();
        $this->get('/successful')->assertSuccessful();
        $this->get('/redirect')->assertRedirect('/home');
        $this->get('/forbidden')->assertForbidden();
        $this->get('/unauthorized')->assertUnauthorized();
    }

    public function test_conhecendo_asserts_de_http_2(): void
    {
        $response = $this->get('/greeting');
        $response->assertSeeText('Welcome to Laravel');
        $response->assertSeeHtml('Welcome <br>to<br> Laravel');

        $this->get('/no-error')->assertDontSeeText('Houve um erro');

        $response = $this->get('/headers');
        $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $response->assertHeader('Cache-Control', 'no-cache, private');

        $this->get('/no-custom-header')->assertHeaderMissing('X-treinaweb-header');

        $this->get('/empty')->assertNoContent();
    }

    function teste_conhecendo_asserts_de_view()
    {
        $response = $this->get('/clients');

        $response->assertViewIs('clients')
                ->assertViewHas('clients', [])
                ->assertViewHas('extra_info', 'Informações adicionais')
                ->assertSeeText('João')
                ->assertSeeText('Informações adicionais');
    }
}
