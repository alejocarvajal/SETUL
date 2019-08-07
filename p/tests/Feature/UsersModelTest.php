<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    function it_loads_the_users_list_page()
    {

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee("No hay usuarios registradoss.");
    }
}
