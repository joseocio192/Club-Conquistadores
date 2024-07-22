<?php

namespace App\Services;

use GuzzleHttp\Client;

class TranslationService
{
    protected $client;
    protected $subscriptionKey;
    protected $endpoint;
    protected $region;

    public function __construct()
    {
        $this->client = new Client();
        $this->subscriptionKey = env('AZURE_TRANSLATOR_KEY');
        $this->endpoint = env('AZURE_TRANSLATOR_ENDPOINT');
        $this->region = env('AZURE_TRANSLATOR_REGION');
    }

    public function translate($text, $fromLanguage, $toLanguages)
    {
        $url = $this->endpoint . '/translate?api-version=3.0&from=' . $fromLanguage . '&to=' . implode('&to=', $toLanguages);

        $response = $this->client->post($url, [
            'headers' => [
                'Ocp-Apim-Subscription-Key' => $this->subscriptionKey,
                'Ocp-Apim-Subscription-Region' => $this->region,  // Incluir la región aquí
                'Content-Type' => 'application/json'
            ],
            'json' => [
                ['Text' => $text]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
