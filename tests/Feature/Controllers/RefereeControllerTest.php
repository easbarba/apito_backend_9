<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Illuminate\Http\Response;
use Tests\TestCase;

class RefereeControllerTest extends TestCase
{
    public function test_index_returns_data_invalid_format(): void
    {
        $this->getJson(route('referees.index'))
             ->assertStatus(Response::HTTP_OK);
    }

        public function test_registers_successfully(): void
        {
            $payload = ['name' => 'Paulo Cesar', 'state' => 'Rio Grande do Norte'];

            $this->postJson(route('referees.store'), $payload)
                 ->assertStatus(Response::HTTP_CREATED)
                 ->assertJsonStructure([
                     'data' => [
                         'id',
                         'name',
                         'state',
                         'created_at',
                         'updated_at']])
                 ->assertSee('Paulo Cesar');
        }
}
