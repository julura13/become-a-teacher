<?php

namespace Tests\Feature\Http\Controllers;

use App\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CandidateController
 */
class CandidateControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $candidates = Candidate::factory()->count(3)->create();

        $response = $this->get(route('candidate.index'));

        $response->assertOk();
        $response->assertViewIs('candidate.index');
        $response->assertViewHas('posts');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $candidate = Candidate::factory()->create();

        $response = $this->get(route('candidate.show', $candidate));

        $response->assertOk();
        $response->assertViewIs('candidate.show');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('candidate.create'));

        $response->assertOk();
        $response->assertViewIs('candidate.create');
    }


    /**
     * @test
     */
    public function Store_saves()
    {
        $response = $this->get(route('candidate.Store'));

        $response->assertSessionHas('message', $message);

        $this->assertDatabaseHas(candidates, [ /* ... */ ]);
    }
}
