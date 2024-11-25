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
}
