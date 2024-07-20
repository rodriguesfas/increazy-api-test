<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ViaCepController extends Controller
{
    public function search($ceps)
    {
        $cepsArray = explode(',', $ceps);
        $results = [];

        foreach ($cepsArray as $cep) {
            $formattedCep = str_replace('-', '', $cep);
            $cacheKey = "cep_{$formattedCep}";

            $data = Cache::get($cacheKey);

            if (!$data) {
                $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
                if ($response->successful()) {
                    $data = $response->json();
                    Cache::put($cacheKey, $data, now()->addMinutes(60));
                } else {
                    continue;
                }
            }

            $results[] = [
                'cep' => $formattedCep,
                'label' => "{$data['logradouro']}, {$data['localidade']}",
                'logradouro' => $data['logradouro'],
                'complemento' => $data['complemento'],
                'bairro' => $data['bairro'],
                'localidade' => $data['localidade'],
                'uf' => $data['uf'],
                'ibge' => $data['ibge'],
                'gia' => $data['gia'],
                'ddd' => $data['ddd'],
                'siafi' => $data['siafi']
            ];
        }

        usort($results, function ($a, $b) {
            return $b['cep'] <=> $a['cep'];
        });

        return response()->json($results);
    }
}
