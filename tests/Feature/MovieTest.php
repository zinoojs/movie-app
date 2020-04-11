<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /** @test */
    public function the_main_page_show_correct_info()
    {
        $response = $this->get(route('movie.index'));
        $response->assertSuccessful();
    }
}
