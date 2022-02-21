<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Grupo;
use Laravel\Sanctum\Sanctum;

class GrupoUsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Sanctum::actingAs(
            User::factory()
                ->hasAttached(
                    Grupo::factory()->count(3)
                )
            ->create()
        );

        $response = $this->get('/api/grupos');

        $response->assertStatus(200)
        ->assertJsonStructure(['data' => [['curso', 'letra', 'nivel']]])
        ->assertJsonCount(3, 'data');
    }
}
