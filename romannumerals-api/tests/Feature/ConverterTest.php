<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConverterTest extends TestCase
{

    public function test_example()
    {

        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function testNumeralToRomanWithValidNumber()
    {

        $response = $this->json('GET', '/api/v1/arabic-to-roman/10');

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Dados recuperados com sucesso.',
                    'data'    => 
                    [
                        'roman' => 'X',
                        'number' => 10
                    ]
                ]);

    }

    public function testRomanToNumeralWithValidLetter()
    {

        $response = $this->json('GET', '/api/v1/roman-to-arabic/x');

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Dados recuperados com sucesso.',
                     'status'  => 200,
                     'data'    => 
                     [
                         'roman' => 'X',
                         'number' => 10
                     ]
                 ]);

    }

}