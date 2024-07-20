<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViaCepControllerTest extends TestCase
{
    public function testSearchStoresAndRetrievesFromCache()
    {
        // Dados de resposta simulados
        $cep = '01001000';
        $responseData = [
            'cep' => $cep,
            'logradouro' => 'Praça da Sé',
            'complemento' => '',
            'bairro' => 'Sé',
            'localidade' => 'São Paulo',
            'uf' => 'SP',
            'ibge' => '3550308',
            'gia' => '1004',
            'ddd' => '11',
            'siafi' => '7107'
        ];

        // Simula a resposta da API
        Http::fake([
            "https://viacep.com.br/ws/{$cep}/json/" => Http::response($responseData, 200)
        ]);

        // Simula a resposta do cache
        Cache::shouldReceive('get')
            ->once()
            ->with("cep_{$cep}")
            ->andReturn(null);

        Cache::shouldReceive('put')
            ->once()
            ->with("cep_{$cep}", $responseData, \Mockery::type('DateTime'));

        // Faz a chamada ao endpoint
        $response = $this->get("/search/local/{$cep}");

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200);

        // Verifica se os dados retornados estão corretos
        $response->assertJson([
            [
                'cep' => $cep,
                'label' => "{$responseData['logradouro']}, {$responseData['localidade']}",
                'logradouro' => $responseData['logradouro'],
                'complemento' => $responseData['complemento'],
                'bairro' => $responseData['bairro'],
                'localidade' => $responseData['localidade'],
                'uf' => $responseData['uf'],
                'ibge' => $responseData['ibge'],
                'gia' => $responseData['gia'],
                'ddd' => $responseData['ddd'],
                'siafi' => $responseData['siafi']
            ]
        ]);
    }
}
